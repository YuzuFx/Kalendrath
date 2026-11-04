<?php

namespace OGame\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OGame\Services\PlanetService;

/**
 * A Kalendrath city, backed by the domain's PlanetService (there are no moons in Kalendrath).
 *
 * @mixin PlanetService
 */
class CityResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $coordinate = $this->getPlanetCoordinates();

        return [
            'id' => $this->getPlanetId(),
            'name' => $this->getPlanetName(),
            // Region / Reach / Shard (galaxy / system / position in the domain).
            'location' => [
                'region' => $coordinate->galaxy,
                'reach' => $coordinate->system,
                'shard' => $coordinate->position,
                'label' => $coordinate->asString(),
            ],
            'resources' => KalendrathResourceMap::forCity($this->resource),
        ];
    }
}
