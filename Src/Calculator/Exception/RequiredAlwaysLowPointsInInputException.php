<?php

declare(strict_types=1);

namespace Src\Calculator\Exception;

class RequiredAlwaysLowPointsInInputException extends \Exception
{
    public static function create(string $subject, int $minimum): self
    {
        return new self(sprintf(
            '[%s]. Nem lehetséges a pontszámítás a %s tárgyból elért %s alatti eredmény miatt!',
            __CLASS__,
            $subject,
            (string) $minimum
        ));
    }
}
