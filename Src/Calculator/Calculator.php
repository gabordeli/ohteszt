<?php

declare(strict_types=1);

namespace Src\Calculator;

use Src\Calculator\Calculators\ELTE_IK_ProgramtervezoInformatikusCalculator;
use Src\Calculator\Calculators\PPKE_BTK_Anglisztika;
use Src\Entity\ValueObject\InputData;

class Calculator
{
    use CalculatorValidatorTrait;

    protected static InputData $inputData;

    protected static array $calculators = [
        ELTE_IK_ProgramtervezoInformatikusCalculator::NAME => ELTE_IK_ProgramtervezoInformatikusCalculator::class,
        PPKE_BTK_Anglisztika::NAME => PPKE_BTK_Anglisztika::class,
    ];
    public static function calculate(InputData $inputData): void
    {
        static::$inputData = $inputData;

        self::validateCalculators();

        $basicPoints = self::calculateBasicPoints($inputData);
        $plusPoints = self::calculatePlusPoints($inputData);

        dump($basicPoints);
        dd($plusPoints);
    }

    protected static function getRequiredCalculatorName(): string
    {
        $valasztottSzak = static::$inputData->getValasztottSzak();

        return $valasztottSzak->getEgyetem()->value.
            $valasztottSzak->getKar()->value.
            $valasztottSzak->getSzak()->value;
    }


    protected static function getRequiredCalculator(): object
    {
        return new self::$calculators[self::getRequiredCalculatorName()];
    }


    private static function calculateBasicPoints(InputData $inputData): int
    {

        //dd($inputData);


        $requiredCalculator = self::getRequiredCalculator();

        dd($requiredCalculator->required);


        return 0;
    }

    private static function calculatePlusPoints(InputData $inputData): int
    {
        return 0;
    }
}
