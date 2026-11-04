<?php

namespace OGame\Http\Resources;

use OGame\Services\PlanetService;

/**
 * Single place where the Kalendrath resources (GDD 4.1, lexique) are mapped onto the
 * OGameX domain, which keeps its upstream machine names:
 *
 *   wood  (Bois)         <- metal
 *   iron  (Fer)          <- crystal
 *   mana  (Mana)         <- deuterium
 *   food  (Nourriture)   <- none yet: OGameX has no stored resource to reuse (its Energy is a
 *                           recomputed balance, not a stock). GDD 5.1 plans Food as a new stored
 *                           mechanic in the domain. Until it exists the API exposes `food: null`
 *                           so the client contract is already stable.
 *
 * Displayed names (FR/EN) are the client's concern, via resources/lang/.
 */
class KalendrathResourceMap
{
    /**
     * @return array{wood: array<string, int>, iron: array<string, int>, mana: array<string, int>, food: null}
     */
    public static function forCity(PlanetService $city): array
    {
        return [
            'wood' => self::entry($city->metal()->get(), $city->metalStorage()->get(), $city->getMetalProductionPerHour()),
            'iron' => self::entry($city->crystal()->get(), $city->crystalStorage()->get(), $city->getCrystalProductionPerHour()),
            'mana' => self::entry($city->deuterium()->get(), $city->deuteriumStorage()->get(), $city->getDeuteriumProductionPerHour()),
            'food' => null,
        ];
    }

    /**
     * @return array{amount: int, storage: int, production_per_hour: int}
     */
    private static function entry(float $amount, float $storage, float $perHour): array
    {
        return [
            'amount' => (int) floor($amount),
            'storage' => (int) floor($storage),
            'production_per_hour' => (int) floor($perHour),
        ];
    }
}
