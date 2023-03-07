<?php

declare(strict_types=1);

namespace Src\Calculator\Exception;

class RequiredAlwaysMissingInInputException extends \Exception
{
    public static function create(): self
    {
        return new self(sprintf(
            '[%s]. Nem lehetséges a pontszámítás a kötelező érettségi tárgyak hiánya miatt',
            __CLASS__
        ));
    }
}
