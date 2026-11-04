<?php

namespace Tests\Feature\Api\V1;

use OGame\Factories\PlanetServiceFactory;
use OGame\Models\User;
use Tests\IsolatedAccountTestCase;

/**
 * API v1, first screen: Sanctum token authentication, player identity, cities and resources (Kalendrath vocabulary: no planets, no moons).
 * Requests are authenticated by bearer token only (the web session set up by the base class
 * must never grant access to the API).
 */
class ApiV1Test extends IsolatedAccountTestCase
{
    private function tokenFor(User $user): string
    {
        return $user->createToken('phpunit')->plainTextToken;
    }

    /**
     * Each request starts with fresh guards so a previous token cannot leak into the next call.
     */
    private function apiGet(string $uri, string|null $token = null): \Illuminate\Testing\TestResponse
    {
        $this->app['auth']->forgetGuards();

        return $this->withHeaders($token !== null ? ['Authorization' => 'Bearer ' . $token] : [])->getJson($uri);
    }

    private function currentUser(): User
    {
        return User::findOrFail($this->currentUserId);
    }

    public function testTokenIsIssuedForValidCredentials(): void
    {
        $response = $this->postJson('/api/v1/auth/token', [
            'email' => $this->currentUser()->email,
            'password' => 'password',
            'device_name' => 'react-spa',
        ]);

        $response->assertStatus(201)->assertJsonStructure(['token']);
        $this->assertDatabaseHas('personal_access_tokens', [
            'tokenable_id' => $this->currentUserId,
            'name' => 'react-spa',
        ]);
    }

    public function testTokenIsRefusedForWrongPassword(): void
    {
        $this->postJson('/api/v1/auth/token', [
            'email' => $this->currentUser()->email,
            'password' => 'wrong',
            'device_name' => 'react-spa',
        ])->assertStatus(422);
    }

    public function testTokenRequestIsValidated(): void
    {
        $this->postJson('/api/v1/auth/token', [])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['email', 'password', 'device_name']);
    }

    public function testTokenCanBeRevoked(): void
    {
        $token = $this->tokenFor($this->currentUser());

        $this->app['auth']->forgetGuards();
        $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->deleteJson('/api/v1/auth/token')
            ->assertStatus(204);

        $this->apiGet('/api/v1/me', $token)->assertStatus(401);
    }

    public function testRevokeRequiresAuthentication(): void
    {
        $this->app['auth']->forgetGuards();
        $this->deleteJson('/api/v1/auth/token')->assertStatus(401);
    }

    public function testMeReturnsAuthenticatedPlayer(): void
    {
        $this->apiGet('/api/v1/me', $this->tokenFor($this->currentUser()))
            ->assertOk()
            ->assertJsonPath('data.id', $this->currentUserId)
            ->assertJsonPath('data.username', $this->currentUsername)
            ->assertJsonPath('data.current_city_id', $this->currentPlanetId);
    }

    public function testMeRequiresAuthentication(): void
    {
        $this->apiGet('/api/v1/me')->assertStatus(401);
    }

    public function testWebSessionDoesNotAuthenticateTheApi(): void
    {
        // The base class logged the user in through the web guard: still no access without token.
        $this->apiGet('/api/v1/cities')->assertStatus(401);
    }

    public function testCitiesListReturnsOwnCitiesOnly(): void
    {
        $foreign = $this->createForeignPlanet();

        $response = $this->apiGet('/api/v1/cities', $this->tokenFor($this->currentUser()))->assertOk();

        $ids = array_column($response->json("data"), "id");
        $this->assertContains($this->currentPlanetId, $ids);
        $this->assertContains(($this->secondPlanetService?->getPlanetId() ?? 0), $ids);
        $this->assertNotContains($foreign->getPlanetId(), $ids);
    }

    public function testCitiesListRequiresAuthentication(): void
    {
        $this->apiGet('/api/v1/cities')->assertStatus(401);
    }

    public function testCityShowReturnsResources(): void
    {
        $this->apiGet('/api/v1/cities/' . $this->currentPlanetId, $this->tokenFor($this->currentUser()))
            ->assertOk()
            ->assertJsonPath('data.id', $this->currentPlanetId)
            ->assertJsonStructure(['data' => [
                'id', 'name', 'location' => ['region', 'reach', 'shard', 'label'],
                'resources' => [
                    'wood' => ['amount', 'storage', 'production_per_hour'],
                    'iron' => ['amount', 'storage', 'production_per_hour'],
                    'mana' => ['amount', 'storage', 'production_per_hour'],
                    'food',
                ],
            ]]);
    }

    public function testCityShowRequiresAuthentication(): void
    {
        $this->apiGet('/api/v1/cities/' . $this->currentPlanetId)->assertStatus(401);
    }

    public function testCityShowForbidsCityOfAnotherPlayer(): void
    {
        $foreign = $this->createForeignPlanet();

        $this->apiGet('/api/v1/cities/' . $foreign->getPlanetId(), $this->tokenFor($this->currentUser()))
            ->assertStatus(403);
    }

    public function testCityShowForbidsMoonOfAnotherPlayer(): void
    {
        $foreignMoon = $this->createForeignMoon();

        $this->apiGet('/api/v1/cities/' . $foreignMoon->getPlanetId(), $this->tokenFor($this->currentUser()))
            ->assertStatus(403);
    }

    public function testCityResourcesAreExposedUnderKalendrathNames(): void
    {
        $response = $this->apiGet('/api/v1/cities/' . $this->currentPlanetId, $this->tokenFor($this->currentUser()))->assertOk();

        $this->assertEquals(
            (int) floor($this->planetService->metal()->get()),
            $response->json('data.resources.wood.amount')
        );
        $this->assertEquals(
            (int) floor($this->planetService->crystal()->get()),
            $response->json('data.resources.iron.amount')
        );
        $this->assertEquals(
            (int) floor($this->planetService->deuterium()->get()),
            $response->json('data.resources.mana.amount')
        );
        // Food is not implemented in the domain yet (GDD 5.1).
        $this->assertNull($response->json('data.resources.food'));
        $this->assertArrayNotHasKey('metal', $response->json('data.resources'));
    }

    public function testOwnMoonIsNeitherListedNorShownAsACity(): void
    {
        $moon = resolve(PlanetServiceFactory::class)->createMoonForPlanet($this->planetService, 0, 0);
        $token = $this->tokenFor($this->currentUser());

        $ids = array_column($this->apiGet('/api/v1/cities', $token)->json('data'), 'id');
        $this->assertNotContains($moon->getPlanetId(), $ids);

        $this->apiGet('/api/v1/cities/' . $moon->getPlanetId(), $token)->assertStatus(404);
    }
}
