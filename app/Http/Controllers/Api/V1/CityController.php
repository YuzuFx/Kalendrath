<?php

namespace OGame\Http\Controllers\Api\V1;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use OGame\Http\Controllers\Controller;
use OGame\Http\Resources\CityResource;
use OGame\Services\PlayerService;

class CityController extends Controller
{
    /**
     * Cities of the authenticated player (the domain's planets; moons do not exist in Kalendrath).
     */
    public function index(PlayerService $player): AnonymousResourceCollection
    {
        return CityResource::collection($player->planets->allPlanets());
    }

    /**
     * One city of the authenticated player, with its resources.
     * A city of another player is refused with a 403; a moon (not a city) is a 404.
     */
    public function show(PlayerService $player, int $cityId): CityResource
    {
        abort_unless($player->planets->planetExistsAndOwnedByPlayer($cityId), 403);

        foreach ($player->planets->allPlanets() as $city) {
            if ($city->getPlanetId() === $cityId) {
                $city->update();

                return new CityResource($city);
            }
        }

        abort(404);
    }
}
