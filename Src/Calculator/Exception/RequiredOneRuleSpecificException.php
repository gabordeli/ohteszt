<?php

declare(strict_types=1);

namespace Src\Calculator\Exception;

class RequiredOneRuleSpecificException extends \Exception
{
    public static function create(): self
    {
        return new self(sprintf(
            '[%s]. Az $input nem felel meg a minimális elvárásoknak mert nem tartalmazza a ruleban az egyet kötelezően megadandó adatot!',
            __CLASS__
        ));
    }
}
