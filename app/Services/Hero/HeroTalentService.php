<?php

namespace OGame\Services\Hero;

use Illuminate\Support\Facades\DB;
use OGame\Enums\HeroRole;
use OGame\Exceptions\HeroRuleException;
use OGame\Models\Hero;
use OGame\Models\HeroTalent;
use OGame\Models\TalentNode;
use OGame\Services\HeroLevelingService;

/**
 * Spends and refunds a hero's talent points (GDD section 5.5): point
 * budget, ranks, "any-of" prerequisites, exclusive choices, and the
 * single-branch rule of advisors.
 */
class HeroTalentService
{
    public function __construct(private readonly HeroLevelingService $leveling)
    {
    }

    /**
     * Talent points the hero can still spend.
     *
     * @param Hero $hero
     * @return int
     */
    public function availablePoints(Hero $hero): int
    {
        return $this->leveling->talentPointsEarned($hero->level) - $hero->talent_points_spent;
    }

    /**
     * Invests one rank into a talent node.
     *
     * @param Hero $hero
     * @param TalentNode $node
     * @return HeroTalent
     */
    public function allocate(Hero $hero, TalentNode $node): HeroTalent
    {
        return DB::transaction(function () use ($hero, $node): HeroTalent {
            // Lock the hero row so two concurrent requests cannot overspend.
            $locked = Hero::whereKey($hero->id)->lockForUpdate()->firstOrFail();

            if ($node->archetype !== $locked->archetype) {
                throw HeroRuleException::because('wrong_archetype');
            }

            $invested = HeroTalent::where('hero_id', $locked->id)->with('talentNode')->get();
            $current = $invested->firstWhere('talent_node_id', $node->id);
            $rank = $current instanceof HeroTalent ? $current->rank : 0;

            if ($rank >= $node->max_rank) {
                throw HeroRuleException::because('max_rank_reached');
            }

            if ($this->availablePoints($locked) < $node->point_cost) {
                throw HeroRuleException::because('not_enough_points');
            }

            $this->assertPrerequisitesMet($node, $invested->pluck('talent_node_id')->values()->all());
            $this->assertNoExclusiveConflict($node, $invested->values()->all());

            if ($locked->role === HeroRole::ADVISOR) {
                $this->assertSingleBranch($node, $invested->values()->all());
            }

            $locked->talent_points_spent += $node->point_cost;
            $locked->save();
            // Keep the caller's instance in sync (and not dirty) with the saved row.
            $hero->talent_points_spent = $locked->talent_points_spent;
            $hero->syncOriginalAttribute('talent_points_spent');

            if ($current instanceof HeroTalent) {
                $current->rank = $rank + 1;
                $current->save();

                return $current;
            }

            return HeroTalent::create([
                'hero_id' => $locked->id,
                'talent_node_id' => $node->id,
                'rank' => 1,
            ]);
        });
    }

    /**
     * Refunds every point and clears the hero's talents.
     *
     * @param Hero $hero
     * @return Hero
     */
    public function respec(Hero $hero): Hero
    {
        DB::transaction(function () use ($hero): void {
            HeroTalent::where('hero_id', $hero->id)->delete();
            Hero::whereKey($hero->id)->update(['talent_points_spent' => 0]);
            $hero->talent_points_spent = 0;
            $hero->syncOriginalAttribute('talent_points_spent');
        });

        return $hero;
    }

    /**
     * A node with prerequisites needs at least ONE of them invested.
     *
     * @param TalentNode $node
     * @param array<int, mixed> $investedNodeIds
     * @return void
     */
    private function assertPrerequisitesMet(TalentNode $node, array $investedNodeIds): void
    {
        $prerequisiteIds = $node->prerequisites()->pluck('talent_nodes.id')->all();

        if ($prerequisiteIds !== [] && array_intersect($prerequisiteIds, $investedNodeIds) === []) {
            throw HeroRuleException::because('prerequisite_missing');
        }
    }

    /**
     * @param TalentNode $node
     * @param array<int, HeroTalent> $invested
     * @return void
     */
    private function assertNoExclusiveConflict(TalentNode $node, array $invested): void
    {
        foreach ($invested as $talent) {
            if ($talent->talentNode?->isExclusiveWith($node)) {
                throw HeroRuleException::because('exclusive_choice');
            }
        }
    }

    /**
     * An advisor has a single talent tree (one branch).
     *
     * @param TalentNode $node
     * @param array<int, HeroTalent> $invested
     * @return void
     */
    private function assertSingleBranch(TalentNode $node, array $invested): void
    {
        foreach ($invested as $talent) {
            $branch = $talent->talentNode?->branch;
            if ($node->branch !== null && $branch !== null && $branch !== $node->branch) {
                throw HeroRuleException::because('advisor_single_branch');
            }
        }
    }
}
