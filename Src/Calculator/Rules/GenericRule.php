<?php

declare(strict_types=1);

namespace Src\Calculator\Rules;

use Src\Entity\Enumeration\Szakkozepiskola\Tantargy;

abstract class GenericRule
{
    public const NAME = '';
    protected static Tantargy $required;
    protected static array $requiredOne;
}
