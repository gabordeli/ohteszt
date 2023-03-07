<?php

declare(strict_types=1);

namespace Src\Calculator\Rules;

use Src\Entity\Enumeration\Szakkozepiskola\Tantargy;

interface RuleInterface
{
    public static function getRequired(): Tantargy;

    public static function getRequiredOne(): array;
}
