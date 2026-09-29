<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Replaces the single prerequisite_talent_node_id FK with a
        // many-to-many self-join: a node can now have several prerequisites,
        // any one of which (rank > 0) is enough to unlock it — the
        // "any-of" branching/merging graph requested for the talent tree
        // (GDD 5.5), instead of a single linear chain per branch.
        Schema::create('talent_node_prerequisites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('talent_node_id')->constrained('talent_nodes')->cascadeOnDelete();
            $table->foreignId('prerequisite_talent_node_id')->constrained('talent_nodes')->cascadeOnDelete();
            $table->unique(['talent_node_id', 'prerequisite_talent_node_id'], 'talent_node_prerequisites_unique');
        });

        DB::table('talent_nodes')
            ->whereNotNull('prerequisite_talent_node_id')
            ->select('id', 'prerequisite_talent_node_id')
            ->orderBy('id')
            ->each(function (object $node) {
                DB::table('talent_node_prerequisites')->insert([
                    'talent_node_id' => $node->id,
                    'prerequisite_talent_node_id' => $node->prerequisite_talent_node_id,
                ]);
            });

        Schema::table('talent_nodes', function (Blueprint $table) {
            $table->dropForeign(['prerequisite_talent_node_id']);
            $table->dropColumn('prerequisite_talent_node_id');

            // Horizontal placement within a tier (row), for branches that
            // split into several parallel nodes at the same tier. 0 for a
            // single-node tier; centered around 0 otherwise (e.g. -1/0/1).
            $table->integer('position')->default(0)->after('tier');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('talent_nodes', function (Blueprint $table) {
            $table->dropColumn('position');
            $table->foreignId('prerequisite_talent_node_id')->nullable()->after('description')->constrained('talent_nodes')->nullOnDelete();
        });

        DB::table('talent_node_prerequisites')
            ->select('talent_node_id', 'prerequisite_talent_node_id')
            ->orderBy('id')
            ->each(function (object $edge) {
                DB::table('talent_nodes')
                    ->where('id', $edge->talent_node_id)
                    ->update(['prerequisite_talent_node_id' => $edge->prerequisite_talent_node_id]);
            });

        Schema::dropIfExists('talent_node_prerequisites');
    }
};
