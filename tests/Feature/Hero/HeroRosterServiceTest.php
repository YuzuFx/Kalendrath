<?php

namespace Tests\Feature\Hero;

use OGame\Enums\HeroArchetype;
use OGame\Enums\HeroRole;
use OGame\Exceptions\HeroRuleException;
use OGame\Models\User;
use OGame\Services\Hero\HeroRosterService;

class HeroRosterServiceTest extends HeroTestCase
{
    public function testMainHeroIsCreatedWithMainRole(): void
    {
        $this->assertSame(HeroRole::MAIN, $this->hero->role);
        $this->assertSame('warrior', $this->hero->archetype);
        $this->assertSame(1, $this->hero->level);
    }

    public function testPlayerCannotHaveTwoMainHeroes(): void
    {
        $this->expectException(HeroRuleException::class);

        resolve(HeroRosterService::class)->recruitMain($this->user, HeroArchetype::SORCERER, 'Second');
    }

    public function testTwoPlayersEachHaveTheirMainHero(): void
    {
        $other = User::factory()->create();

        $hero = resolve(HeroRosterService::class)->recruitMain($other, HeroArchetype::RANGER, 'Other');

        $this->assertSame($other->id, $hero->user_id);
    }

    public function testAdvisorCanBeOfAnyArchetype(): void
    {
        $advisor = resolve(HeroRosterService::class)->recruitAdvisor($this->user, HeroArchetype::STEWARD, 'Counsellor');

        $this->assertSame(HeroRole::ADVISOR, $advisor->role);
        $this->assertNull($advisor->main_marker);
        $this->assertSame('steward', $advisor->archetype);
    }

    public function testCouncilIsLimitedToConfiguredSeats(): void
    {
        $roster = resolve(HeroRosterService::class);
        for ($i = 0; $i < 4; $i++) {
            $roster->recruitAdvisor($this->user, HeroArchetype::WARRIOR, 'Advisor ' . $i);
        }

        $this->expectException(HeroRuleException::class);
        $roster->recruitAdvisor($this->user, HeroArchetype::WARRIOR, 'One too many');
    }

    public function testAdvisorRequiresAMainHero(): void
    {
        $other = User::factory()->create();

        $this->expectException(HeroRuleException::class);
        resolve(HeroRosterService::class)->recruitAdvisor($other, HeroArchetype::WARRIOR, 'Orphan');
    }

    public function testErrorMessagesAreTranslatedInFrenchAndEnglish(): void
    {
        foreach (['fr', 'en'] as $locale) {
            app()->setLocale($locale);
            $this->assertNotSame('t_heroes.error.council_full', __('t_heroes.error.council_full'));
            $this->assertNotSame('t_heroes.archetype.faithwarden', __('t_heroes.archetype.faithwarden'));
        }

        app()->setLocale('en');
        $this->assertSame('Faithwarden', HeroArchetype::FAITHWARDEN->getName());
        app()->setLocale('fr');
        $this->assertSame('Gardien de la Foi', HeroArchetype::FAITHWARDEN->getName());
    }
}
