<?php

namespace OGame\Exceptions\Kaelite;

use RuntimeException;

/**
 * Thrown when a spend is attempted on a frozen wallet (precautionary freeze).
 */
class KaeliteWalletFrozenException extends RuntimeException
{
}
