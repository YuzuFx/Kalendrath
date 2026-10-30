<?php

namespace OGame\Exceptions;

use RuntimeException;

/**
 * A hero rule was broken (not enough talent points, slot not allowed...).
 * The message is a translation key resolved in the t_heroes file, so the
 * future API layer can display it as is.
 */
class HeroRuleException extends RuntimeException
{
    /**
     * Builds the exception from a t_heroes.error.* key.
     *
     * @param string $key
     * @return self
     */
    public static function because(string $key): self
    {
        return new self(__('t_heroes.error.' . $key));
    }
}
