<?php

declare(strict_types=1);

namespace Src\Calculator;

use Src\Calculator\Exception\CalculatorCountException;
use Src\Calculator\Exception\RequiredCalculatorException;

trait CalculatorValidatorTrait
{
    public static function validateCalculators(): void
    {
        self::validateValidatorsCount();
        self::validateRequiredCalculatorForInput();
    }

    private static function validateValidatorsCount(): void
    {
        if (0 === \count(static::$calculators)) {
            throw CalculatorCountException::create(static::class);
        }
    }

    private static function validateRequiredCalculatorForInput(): void
    {
        $requiredCalculator = self::getRequiredCalculatorName();

        if (false === \array_key_exists($requiredCalculator, static::$calculators)) {
            throw RequiredCalculatorException::create($requiredCalculator);
        }
    }
}
