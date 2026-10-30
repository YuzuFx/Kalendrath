<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Earned Kaelite: balance attached to the SERVER where it was earned.
 * Lives in the game server database. Not transferable.
 */
return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kaelite_earned_wallets', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id', false, true);
            $table->foreign('user_id')->references('id')->on('users');

            // Server that owns this balance (config kaelite.server_key by default).
            $table->string('server_key', 64);
            $table->unique(['user_id', 'server_key']);

            $table->unsignedBigInteger('balance')->default(0);

            $table->timestamps();
        });

        // Append-only ledger.
        Schema::create('kaelite_earned_entries', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id', false, true);
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('server_key', 64);

            $table->string('type');

            // Signed amount: positive = credit, negative = debit (0 allowed for a spend
            // fully paid with purchased Kaelite: the entry then records the spend itself).
            $table->bigInteger('amount');
            $table->unsignedBigInteger('balance_after');

            $table->string('idempotency_key', 191)->unique();
            $table->string('reference')->nullable();
            $table->json('meta')->nullable();

            $table->timestamp('created_at')->useCurrent();

            $table->index(['user_id', 'server_key', 'id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kaelite_earned_entries');
        Schema::dropIfExists('kaelite_earned_wallets');
    }
};
