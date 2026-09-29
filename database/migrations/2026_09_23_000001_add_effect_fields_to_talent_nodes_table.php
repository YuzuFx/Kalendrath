<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('talent_nodes', function (Blueprint $table) {
            // Structured effect (GDD 5.5): a talent's mechanical payload.
            // effect_type is a free-form key (e.g. "damage_bonus_percent",
            // "production_bonus_percent") rather than a DB enum, since the
            // set of effect types will grow as talent content is authored
            // and shouldn't require a migration each time. effect_scope is
            // a small fixed set, backed by TalentEffectScope.
            $table->string('effect_type')->nullable()->after('description');
            $table->decimal('effect_value', 8, 2)->nullable()->after('effect_type');
            $table->string('effect_scope')->nullable()->after('effect_value');

            // Nodes sharing the same non-null choice_group within an
            // archetype are mutually exclusive (WoW-style split talent):
            // allocating one forbids allocating the other.
            $table->string('choice_group')->nullable()->after('prerequisite_talent_node_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('talent_nodes', function (Blueprint $table) {
            $table->dropColumn(['effect_type', 'effect_value', 'effect_scope', 'choice_group']);
        });
    }
};
