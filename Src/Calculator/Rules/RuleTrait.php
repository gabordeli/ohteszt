<?php

declare(strict_types=1);

namespace Src\Calculator\Rules;

use Src\Entity\Enumeration\Szakkozepiskola\Tantargy;

trait RuleTrait
{
    public static function getRequired(): Tantargy
    {
        return static::$required;
    }

    public static function getRequiredOne(): array
    {
        return static::$requiredOne;
    }
}
