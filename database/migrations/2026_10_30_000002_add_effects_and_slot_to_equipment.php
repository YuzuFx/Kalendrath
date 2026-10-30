<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('equipment_items', function (Blueprint $table) {
            // Same effect payload as talent_nodes (free-form key, numeric
            // magnitude, TalentEffectScope), so talents and equipment feed the
            // same effects aggregation.
            $table->string('effect_type')->nullable()->after('description');
            $table->decimal('effect_value', 8, 2)->nullable()->after('effect_type');
            $table->string('effect_scope')->nullable()->after('effect_value');

            // Minimum hero level to wear the item.
            $table->unsignedTinyInteger('required_level')->default(1)->after('rarity');
        });

        Schema::table('hero_equipment', function (Blueprint $table) {
            // The slot occupied while equipped, NULL in the inventory. The
            // unique index makes "one item per slot per hero" a database rule.
            $table->string('slot')->nullable()->after('equipped');
            $table->unique(['hero_id', 'slot']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hero_equipment', function (Blueprint $table) {
            $table->dropUnique(['hero_id', 'slot']);
            $table->dropColumn('slot');
        });

        Schema::table('equipment_items', function (Blueprint $table) {
            $table->dropColumn(['effect_type', 'effect_value', 'effect_scope', 'required_level']);
        });
    }
};
