<?php

namespace OGame\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use OGame\Models\Hero;
use OGame\Models\TalentNode;
use OGame\Services\HeroLevelingService;

/**
 * Pilot controller for the hero/governor system (GDD section 5.5).
 * Minimal and non-functional: lists the current player's heroes and shows
 * a hero sheet (talents, equipment). No recruitment, mission, or bonus
 * logic yet.
 */
class HeroController extends OGameController
{
    /**
     * Shows the hero index page.
     *
     * @param HeroLevelingService $levelingService
     * @return View
     */
    public function index(HeroLevelingService $levelingService): View
    {
        $this->setBodyId('heroes');

        $heroes = Hero::where('user_id', auth()->id())->get();

        $heroCards = $heroes->map(fn (Hero $hero) => $this->buildProgressionData($hero, $levelingService));

        return view('ingame.hero.index')->with([
            'heroCards' => $heroCards,
        ]);
    }

    /**
     * Shows a single hero's sheet: talents and equipment inventory.
     *
     * @param Hero $hero
     * @param HeroLevelingService $levelingService
     * @return View
     */
    public function show(Hero $hero, HeroLevelingService $levelingService): View
    {
        abort_unless($hero->user_id === auth()->id(), 403);

        $this->setBodyId('heroes');

        $hero->load(['talents', 'equipment.equipmentItem']);

        $equipped = $hero->equipment->where('equipped', true);
        $inventory = $hero->equipment->where('equipped', false);

        // Full tree for this hero's archetype, with the hero's allocated
        // rank (0 if not yet invested) attached to each node. A null branch
        // is a capstone spanning every column; every other node is laid out
        // in a pixel graph (see buildTalentGraph()) since a branch can now
        // split into several parallel nodes per tier with multiple
        // "any-of" prerequisites, not just a single linear chain.
        $allocatedRanks = $hero->talents->pluck('rank', 'talent_node_id');
        $nodesWithRank = TalentNode::where('archetype', $hero->archetype)
            ->with('prerequisites')
            ->orderBy('tier')
            ->orderBy('position')
            ->orderBy('id')
            ->get()
            ->map(fn (TalentNode $node) => [
                'node' => $node,
                'rank' => (int) $allocatedRanks->get($node->id, 0),
            ]);

        $talentBranches = $this->buildTalentGraph(
            $nodesWithRank->filter(fn (array $entry) => $entry['node']->branch !== null)
        );

        $talentCapstones = $nodesWithRank->filter(fn (array $entry) => $entry['node']->branch === null);

        return view('ingame.hero.show')->with([
            'card' => $this->buildProgressionData($hero, $levelingService),
            'equipped' => $equipped,
            'inventory' => $inventory,
            'talentBranches' => $talentBranches,
            'talentCapstones' => $talentCapstones,
        ]);
    }

    private const int NODE_WIDTH = 150;
    private const int NODE_HEIGHT = 100;
    private const int COLUMN_SPACING = 174; // NODE_WIDTH + 24px horizontal gap
    private const int ROW_HEIGHT = 140; // NODE_HEIGHT + 40px vertical gap for connector lines

    /**
     * Lays out one archetype's non-capstone talent nodes as a pixel-positioned
     * graph per branch: node coordinates come from (tier, position), and an
     * edge is drawn for every prerequisite relationship. A child is only
     * reachable once ANY ONE of its prerequisites has rank > 0 (WoW-style
     * branching/merging), so an edge is "lit" only once both of its ends are
     * actually invested — a coarse but sufficient visual approximation for
     * this mockup stage.
     *
     * @param Collection<int, array{node: TalentNode, rank: int}> $nodesWithRank
     * @return array<string, array{nodes: array<int, array{node: TalentNode, rank: int, x: int, y: int}>, edges: array<int, array{x1: int, y1: int, x2: int, y2: int, lit: bool}>, width: int, height: int}>
     */
    private function buildTalentGraph(Collection $nodesWithRank): array
    {
        $rankById = $nodesWithRank->pluck('rank', 'node.id');

        $graphs = [];

        foreach ($nodesWithRank->groupBy(fn (array $entry) => (string) $entry['node']->branch) as $branchLabel => $entries) {
            $minPosition = (int) $entries->min(fn (array $entry) => $entry['node']->position);
            $maxPosition = (int) $entries->max(fn (array $entry) => $entry['node']->position);
            $maxTier = (int) $entries->max(fn (array $entry) => $entry['node']->tier);

            $nodes = [];
            $coordsById = [];

            foreach ($entries as $entry) {
                $node = $entry['node'];
                $x = ($node->position - $minPosition) * self::COLUMN_SPACING;
                $y = ($node->tier - 1) * self::ROW_HEIGHT;

                $coordsById[$node->id] = ['x' => $x, 'y' => $y];
                $nodes[] = ['node' => $node, 'rank' => $entry['rank'], 'x' => $x, 'y' => $y];
            }

            $edges = [];
            foreach ($entries as $entry) {
                $node = $entry['node'];
                $childCoords = $coordsById[$node->id];
                $childRank = $rankById->get($node->id, 0);

                foreach ($node->prerequisites as $prerequisite) {
                    if (!isset($coordsById[$prerequisite->id])) {
                        // Prerequisite lives in another branch (or is a
                        // capstone) — not drawable within this branch graph.
                        continue;
                    }

                    $prereqCoords = $coordsById[$prerequisite->id];
                    $prereqRank = $rankById->get($prerequisite->id, 0);

                    $edges[] = [
                        'x1' => $prereqCoords['x'] + (int) (self::NODE_WIDTH / 2),
                        'y1' => $prereqCoords['y'] + self::NODE_HEIGHT,
                        'x2' => $childCoords['x'] + (int) (self::NODE_WIDTH / 2),
                        'y2' => $childCoords['y'],
                        'lit' => $prereqRank > 0 && $childRank > 0,
                    ];
                }
            }

            $graphs[$branchLabel] = [
                'nodes' => $nodes,
                'edges' => $edges,
                'width' => ($maxPosition - $minPosition) * self::COLUMN_SPACING + self::NODE_WIDTH,
                'height' => ($maxTier - 1) * self::ROW_HEIGHT + self::NODE_HEIGHT,
            ];
        }

        return $graphs;
    }

    /**
     * Builds the level/XP/talent-point summary shared by the index cards
     * and the hero sheet.
     *
     * @param Hero $hero
     * @param HeroLevelingService $levelingService
     * @return array<string, mixed>
     */
    private function buildProgressionData(Hero $hero, HeroLevelingService $levelingService): array
    {
        $talentPointsEarned = $levelingService->talentPointsEarned($hero->level);

        return [
            'hero' => $hero,
            'xp_required' => $levelingService->xpRequiredForLevel($hero->level),
            'xp_progress_percentage' => $levelingService->progressPercentage($hero->level, $hero->xp),
            'talent_points_earned' => $talentPointsEarned,
            'talent_points_available' => max(0, $talentPointsEarned - $hero->talent_points_spent),
        ];
    }
}
