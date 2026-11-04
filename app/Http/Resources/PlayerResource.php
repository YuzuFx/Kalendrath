<?php

namespace OGame\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OGame\Services\PlayerService;

/**
 * @mixin PlayerService
 */
class PlayerResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getId(),
            'username' => $this->getUsername(false),
            'current_city_id' => $this->getCurrentPlanetId(),
            'vacation_mode' => $this->isInVacationMode(),
        ];
    }
}
