<?php

namespace OGame\Http\Controllers\Api\V1;

use OGame\Http\Controllers\Controller;
use OGame\Http\Resources\PlayerResource;
use OGame\Services\PlayerService;

class MeController extends Controller
{
    public function __invoke(PlayerService $player): PlayerResource
    {
        return new PlayerResource($player);
    }
}
