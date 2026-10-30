<?php

namespace OGame\Exceptions\Kaelite;

use RuntimeException;

/**
 * Thrown when an idempotency key is reused with different parameters.
 */
class KaeliteIdempotencyConflictException extends RuntimeException
{
}
