<?php

namespace OGame\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use OGame\Services\PlayerService;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * API counterpart of GlobalGame: refuses banned accounts with a JSON 403, then loads the
 * authenticated player, binds it as the request PlayerService and brings its state up to
 * date (queues, resources), exactly as the Blade pages do.
 */
class LoadApiPlayer
{
    /**
     * @throws Throwable
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if ($user === null) {
            return $next($request);
        }

        if ($user->isBanned()) {
            return response()->json(['message' => 'This account is banned.'], 403);
        }

        /** @var PlayerService $player */
        $player = resolve(PlayerService::class, ['player_id' => $user->id]);
        app()->instance(PlayerService::class, $player);

        $player->update();
        $player->planets->current()->update();

        return $next($request);
    }
}
