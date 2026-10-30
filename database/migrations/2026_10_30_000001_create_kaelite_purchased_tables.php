<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Purchased Kaelite: balance attached to the ACCOUNT (all servers).
 * In this single-universe repository `users` plays the role of the account;
 * these tables are what the future lobby will own.
 */
return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kaelite_purchased_wallets', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id', false, true);
            $table->foreign('user_id')->references('id')->on('users');
            $table->unique('user_id');

            // Current balance. The ledger is the source of truth, this is the lockable cache.
            $table->unsignedBigInteger('balance')->default(0);

            // Precautionary freeze (payment fraud investigation).
            $table->timestamp('frozen_at')->nullable();
            $table->string('frozen_reason')->nullable();

            $table->timestamps();
        });

        // Append-only ledger.
        Schema::create('kaelite_purchased_entries', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id', false, true);
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('type');

            // Signed amount: positive = credit, negative = debit.
            $table->bigInteger('amount');
            $table->unsignedBigInteger('balance_after');

            // Unique key: replaying the same operation has no second effect.
            $table->string('idempotency_key', 191)->unique();

            // External reference (payment id, order id, ...).
            $table->string('reference')->nullable();
            $table->json('meta')->nullable();

            $table->timestamp('created_at')->useCurrent();

            $table->index(['user_id', 'id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kaelite_purchased_entries');
        Schema::dropIfExists('kaelite_purchased_wallets');
    }
};
