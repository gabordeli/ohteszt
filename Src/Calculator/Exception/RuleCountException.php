<?php

declare(strict_types=1);

namespace Src\Calculator\Exception;

class RuleCountException extends RuleException
{
    public static function create(string $class): self
    {
        return new self(sprintf(
            '[%s]. Nem tartalmaz egyetlen rulet sem => %s',
            __CLASS__,
            $class
        ));
    }
}
