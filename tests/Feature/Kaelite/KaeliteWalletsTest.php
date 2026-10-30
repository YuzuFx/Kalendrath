<?php

namespace Tests\Feature\Kaelite;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use LogicException;
use OGame\Enums\KaeliteTransactionType;
use OGame\Exceptions\Kaelite\InsufficientKaeliteException;
use OGame\Exceptions\Kaelite\KaeliteIdempotencyConflictException;
use OGame\Exceptions\Kaelite\KaeliteNotTransferableException;
use OGame\Exceptions\Kaelite\KaeliteWalletFrozenException;
use OGame\Models\KaeliteEarnedEntry;
use OGame\Models\KaelitePurchasedEntry;
use OGame\Models\User;
use OGame\Services\Kaelite\KaeliteService;
use OGame\Services\Kaelite\PurchasedKaeliteWallet;
use Tests\TestCase;

class KaeliteWalletsTest extends TestCase
{
    use DatabaseTransactions;

    private KaeliteService $kaelite;
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->kaelite = app(KaeliteService::class);
        $this->user = User::factory()->create();
        config(['kaelite.server_key' => 'test-s1']);
    }

    public function testPurchaseCreditsPurchasedBalanceWithBetaBonus(): void
    {
        $this->kaelite->creditPurchase($this->user->id, 1000, 'pay-1', 'order-1', 30);

        $balance = $this->kaelite->balance($this->user->id);
        $this->assertSame(1300, $balance->purchased);
        $this->assertSame(0, $balance->earned);
        $this->assertSame(1300, $balance->total());

        $this->assertSame(
            [KaeliteTransactionType::PURCHASE->value, KaeliteTransactionType::PURCHASE_BONUS->value],
            KaelitePurchasedEntry::where('user_id', $this->user->id)->orderBy('id')->pluck('type')->all()
        );
    }

    public function testBonusDefaultsToConfigAndZeroDisablesIt(): void
    {
        config(['kaelite.beta_bonus_percent' => 30]);
        $this->kaelite->creditPurchase($this->user->id, 100, 'pay-cfg');
        $this->assertSame(130, $this->kaelite->balance($this->user->id)->purchased);

        config(['kaelite.beta_bonus_percent' => 0]);
        $this->kaelite->creditPurchase($this->user->id, 100, 'pay-nobonus');
        $this->assertSame(230, $this->kaelite->balance($this->user->id)->purchased);
        $this->assertSame(0, KaelitePurchasedEntry::where('idempotency_key', 'pay-nobonus:bonus')->count());
    }

    public function testRewardCreditsEarnedBalance(): void
    {
        $this->kaelite->grantReward($this->user->id, 50, 'reward-1', 'event-x');

        $balance = $this->kaelite->balance($this->user->id);
        $this->assertSame(50, $balance->earned);
        $this->assertSame(0, $balance->purchased);
    }

    public function testSpendConsumesEarnedFirstThenPurchased(): void
    {
        $this->kaelite->grantReward($this->user->id, 40, 'reward-1');
        $this->kaelite->creditPurchase($this->user->id, 100, 'pay-1', null, 0);

        $result = $this->kaelite->spend($this->user->id, 70, 'spend-1', 'speedup');

        $this->assertSame(40, $result->earnedSpent);
        $this->assertSame(30, $result->purchasedSpent);
        $this->assertFalse($result->replayed);
        $balance = $this->kaelite->balance($this->user->id);
        $this->assertSame(0, $balance->earned);
        $this->assertSame(70, $balance->purchased);

        // Smaller than the earned balance: purchased is untouched.
        $this->kaelite->grantReward($this->user->id, 20, 'reward-2');
        $result = $this->kaelite->spend($this->user->id, 15, 'spend-2');
        $this->assertSame(15, $result->earnedSpent);
        $this->assertSame(0, $result->purchasedSpent);
        $this->assertSame(70, $this->kaelite->balance($this->user->id)->purchased);
    }

    public function testInsufficientBalanceDebitsNothing(): void
    {
        $this->kaelite->grantReward($this->user->id, 40, 'reward-1');
        $this->kaelite->creditPurchase($this->user->id, 10, 'pay-1', null, 0);

        try {
            $this->kaelite->spend($this->user->id, 51, 'spend-1');
            $this->fail('Expected InsufficientKaeliteException');
        } catch (InsufficientKaeliteException) {
        }

        $balance = $this->kaelite->balance($this->user->id);
        $this->assertSame(40, $balance->earned);
        $this->assertSame(10, $balance->purchased);
        $this->assertSame(0, KaeliteEarnedEntry::where('idempotency_key', 'spend-1')->count());
        $this->assertSame(0, KaelitePurchasedEntry::where('idempotency_key', 'spend-1:purchased')->count());
    }

    public function testPurchaseIsIdempotent(): void
    {
        $first = $this->kaelite->creditPurchase($this->user->id, 100, 'pay-1', null, 30);
        $second = $this->kaelite->creditPurchase($this->user->id, 100, 'pay-1', null, 30);

        $this->assertFalse($first->replayed);
        $this->assertTrue($second->replayed);
        $this->assertSame(130, $this->kaelite->balance($this->user->id)->purchased);
        $this->assertSame(2, KaelitePurchasedEntry::where('user_id', $this->user->id)->count());
    }

    public function testRewardIsIdempotent(): void
    {
        $this->kaelite->grantReward($this->user->id, 50, 'reward-1');
        $replay = $this->kaelite->grantReward($this->user->id, 50, 'reward-1');

        $this->assertTrue($replay->replayed);
        $this->assertSame(50, $this->kaelite->balance($this->user->id)->earned);
    }

    public function testSpendIsIdempotentAndReturnsOriginalSplit(): void
    {
        $this->kaelite->grantReward($this->user->id, 40, 'reward-1');
        $this->kaelite->creditPurchase($this->user->id, 100, 'pay-1', null, 0);

        $this->kaelite->spend($this->user->id, 70, 'spend-1');
        $replay = $this->kaelite->spend($this->user->id, 70, 'spend-1');

        $this->assertTrue($replay->replayed);
        $this->assertSame(40, $replay->earnedSpent);
        $this->assertSame(30, $replay->purchasedSpent);
        $this->assertSame(70, $this->kaelite->balance($this->user->id)->purchased);
    }

    public function testSpendPaidOnlyWithPurchasedIsIdempotent(): void
    {
        $this->kaelite->creditPurchase($this->user->id, 100, 'pay-1', null, 0);

        $this->kaelite->spend($this->user->id, 30, 'spend-1');
        $replay = $this->kaelite->spend($this->user->id, 30, 'spend-1');

        $this->assertTrue($replay->replayed);
        $this->assertSame(0, $replay->earnedSpent);
        $this->assertSame(30, $replay->purchasedSpent);
        $this->assertSame(70, $this->kaelite->balance($this->user->id)->purchased);
    }

    public function testReusingKeyWithDifferentAmountIsRefused(): void
    {
        $this->kaelite->creditPurchase($this->user->id, 100, 'pay-1', null, 0);
        $this->kaelite->spend($this->user->id, 30, 'spend-1');

        $this->expectException(KaeliteIdempotencyConflictException::class);
        $this->kaelite->spend($this->user->id, 31, 'spend-1');
    }

    public function testTotalAndDetailForTheTooltip(): void
    {
        $this->kaelite->grantReward($this->user->id, 25, 'reward-1');
        $this->kaelite->creditPurchase($this->user->id, 100, 'pay-1', null, 0);

        $this->assertSame(
            ['total' => 125, 'earned' => 25, 'purchased' => 100, 'frozen' => false],
            $this->kaelite->balance($this->user->id)->toArray()
        );
    }

    public function testEarnedBalanceIsIsolatedPerServer(): void
    {
        $this->kaelite->grantReward($this->user->id, 50, 'reward-s1');
        $this->kaelite->grantReward($this->user->id, 70, 'reward-s2', null, 'test-s2');
        $this->kaelite->creditPurchase($this->user->id, 10, 'pay-1', null, 0);

        $this->assertSame(50, $this->kaelite->balance($this->user->id)->earned);
        $this->assertSame(70, $this->kaelite->balance($this->user->id, 'test-s2')->earned);
        // Purchased is shared by all servers.
        $this->assertSame(10, $this->kaelite->balance($this->user->id, 'test-s2')->purchased);

        // Spending on s1 cannot touch the earned Kaelite of s2.
        try {
            $this->kaelite->spend($this->user->id, 61, 'spend-1');
            $this->fail('Expected InsufficientKaeliteException');
        } catch (InsufficientKaeliteException) {
        }
        $this->assertSame(70, $this->kaelite->balance($this->user->id, 'test-s2')->earned);
    }

    public function testDefaultServerKeyComesFromConfig(): void
    {
        config(['kaelite.server_key' => 'other-server']);
        $this->kaelite->grantReward($this->user->id, 5, 'reward-1');

        $this->assertSame('other-server', KaeliteEarnedEntry::where('user_id', $this->user->id)->value('server_key'));
    }

    public function testEarnedIsNotUsableByAnotherPlayer(): void
    {
        $other = User::factory()->create();
        $this->kaelite->grantReward($this->user->id, 50, 'reward-1');

        $this->assertSame(0, $this->kaelite->balance($other->id)->total());
        $this->expectException(InsufficientKaeliteException::class);
        $this->kaelite->spend($other->id, 1, 'spend-other');
    }

    public function testEarnedKaeliteIsNotTransferable(): void
    {
        $other = User::factory()->create();
        $this->kaelite->grantReward($this->user->id, 50, 'reward-1');

        try {
            $this->kaelite->transferEarned($this->user->id, $other->id, 10);
        } catch (KaeliteNotTransferableException) {
        }

        $this->assertSame(50, $this->kaelite->balance($this->user->id)->earned);
        $this->assertSame(0, $this->kaelite->balance($other->id)->total());
    }

    public function testFrozenWalletBlocksSpendingButNotCredits(): void
    {
        $this->kaelite->grantReward($this->user->id, 50, 'reward-1');
        $this->kaelite->creditPurchase($this->user->id, 100, 'pay-1', null, 0);
        $wallet = app(PurchasedKaeliteWallet::class);
        $wallet->freeze($this->user->id, 'payment fraud investigation');

        $this->assertTrue($this->kaelite->balance($this->user->id)->frozen);
        try {
            $this->kaelite->spend($this->user->id, 10, 'spend-1');
            $this->fail('Expected KaeliteWalletFrozenException');
        } catch (KaeliteWalletFrozenException) {
        }
        $this->assertSame(150, $this->kaelite->balance($this->user->id)->total());

        // Credits are still recorded while frozen.
        $this->kaelite->creditPurchase($this->user->id, 10, 'pay-2', null, 0);
        $this->assertSame(160, $this->kaelite->balance($this->user->id)->total());

        // An administrative reversal bypasses the freeze.
        $wallet->debit($this->user->id, 10, KaeliteTransactionType::CHARGEBACK, 'chargeback-pay-2');
        $this->assertSame(100, $wallet->balance($this->user->id));

        $wallet->unfreeze($this->user->id);
        $this->kaelite->spend($this->user->id, 10, 'spend-2');
        $this->assertSame(140, $this->kaelite->balance($this->user->id)->total());
    }

    public function testBetaResetWipesEarnedAndKeepsPurchased(): void
    {
        $other = User::factory()->create();
        $this->kaelite->grantReward($this->user->id, 50, 'reward-1');
        $this->kaelite->grantReward($this->user->id, 30, 'reward-other-server', null, 'test-s2');
        $this->kaelite->creditPurchase($this->user->id, 100, 'pay-1', null, 30);
        $this->kaelite->grantReward($other->id, 5, 'reward-other');

        $reset = $this->kaelite->resetServerForBeta('beta-reset-1');
        $this->assertGreaterThanOrEqual(2, $reset);

        $balance = $this->kaelite->balance($this->user->id);
        $this->assertSame(0, $balance->earned);
        $this->assertSame(130, $balance->purchased);
        // Another server is untouched.
        $this->assertSame(30, $this->kaelite->balance($this->user->id, 'test-s2')->earned);
        // The ledger keeps the history.
        $this->assertSame(1, KaeliteEarnedEntry::where('user_id', $this->user->id)->where('type', 'server_reset')->count());

        // Replaying the reset changes nothing.
        $this->assertSame(0, $this->kaelite->resetServerForBeta('beta-reset-1'));
    }

    public function testLedgerIsAppendOnly(): void
    {
        $this->kaelite->creditPurchase($this->user->id, 100, 'pay-1', null, 0);
        $entry = KaelitePurchasedEntry::where('idempotency_key', 'pay-1')->firstOrFail();

        $this->expectException(LogicException::class);
        $entry->update(['amount' => 999]);
    }

    public function testLedgerBalanceAfterIsConsistent(): void
    {
        $this->kaelite->creditPurchase($this->user->id, 100, 'pay-1', null, 0);
        $this->kaelite->spend($this->user->id, 30, 'spend-1');

        $this->assertSame(
            [100, 70],
            KaelitePurchasedEntry::where('user_id', $this->user->id)->orderBy('id')->pluck('balance_after')->map(fn ($v) => (int) $v)->all()
        );
    }
}
