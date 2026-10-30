<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('heroes', function (Blueprint $table) {
            // main / advisor (GDD 5.5, revision of 2026-10-11): one main hero
            // per player, up to four advisors forming the hero's Council.
            $table->string('role')->default('main')->after('archetype');

            // Set to 1 for the main hero, NULL for advisors. The unique index
            // lets the database itself forbid a second main hero per player
            // (NULLs are distinct in a unique index).
            $table->unsignedTinyInteger('main_marker')->nullable()->after('role');
            $table->unique(['user_id', 'main_marker']);
        });

        // Existing heroes are main heroes (the demo hero is the only one).
        DB::table('heroes')->update(['main_marker' => 1]);

        // Archetype keys are now English machine names (HeroArchetype).
        DB::table('heroes')->where('archetype', 'Guerrier')->update(['archetype' => 'warrior']);
        DB::table('talent_nodes')->where('archetype', 'Guerrier')->update(['archetype' => 'warrior']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('heroes')->where('archetype', 'warrior')->update(['archetype' => 'Guerrier']);
        DB::table('talent_nodes')->where('archetype', 'warrior')->update(['archetype' => 'Guerrier']);

        Schema::table('heroes', function (Blueprint $table) {
            $table->dropUnique(['user_id', 'main_marker']);
            $table->dropColumn(['role', 'main_marker']);
        });
    }
};
