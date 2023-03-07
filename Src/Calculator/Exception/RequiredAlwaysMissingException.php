<?php

declare(strict_types=1);

namespace Src\Calculator\Exception;

class RequiredAlwaysMissingException extends \Exception
{
    public static function create(): self
    {
        return new self(sprintf(
            '[%s]. Az $input nem felel meg a minimális elvárásoknak! ',
            __CLASS__
        ));
    }
}
