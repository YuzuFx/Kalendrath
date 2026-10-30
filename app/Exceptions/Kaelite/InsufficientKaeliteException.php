<?php

namespace OGame\Exceptions\Kaelite;

use RuntimeException;

/**
 * Thrown when the combined Kaelite balance cannot cover a debit.
 */
class InsufficientKaeliteException extends RuntimeException
{
}
