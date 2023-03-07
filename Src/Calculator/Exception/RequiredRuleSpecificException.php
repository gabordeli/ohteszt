<?php

declare(strict_types=1);

namespace Src\Calculator\Exception;

class RequiredRuleSpecificException extends \Exception
{
    public static function create(string $required): self
    {
        return new self(sprintf(
            '[%s]. Az $input nem felel meg a minimális elvárásoknak mert nem tartalmazza a ruleban kötelezően megjelölt adatot: %s',
            __CLASS__,
            $required
        ));
    }
}
