<?php

declare(strict_types=1);

namespace Src\Calculator;

use Src\Calculator\Rules\ELTE_IK_ProgramtervezoInformatikus;
use Src\Calculator\Rules\PPKE_BTK_Anglisztika;
use Src\Calculator\Rules\RuleInterface;
use Src\Entity\Enumeration\Szakkozepiskola\Tantargy;
use Src\Entity\ValueObject\ErettsegiEredmeny;
use Src\Entity\ValueObject\InputData;

class Calculator
{
    use CalculatorValidatorTrait;

    private static int $minimumPoint = 20;

    private static InputData $inputData;

    protected static array $rules = [
        ELTE_IK_ProgramtervezoInformatikus::NAME => ELTE_IK_ProgramtervezoInformatikus::class,
        PPKE_BTK_Anglisztika::NAME => PPKE_BTK_Anglisztika::class,
    ];

    protected static array $requiredAlways = [
        Tantargy::MAGYAR_NYELV_ES_IRODALOM,
        Tantargy::TORTENELEM,
        Tantargy::MATEMATIKA,
    ];

    public static function calculate(InputData $inputData): array
    {
        self::$inputData = $inputData;

        self::validateValidatorsCount();
        self::validateRequiredCalculatorOnInput();
        self::validateRequiredAlwaysOnInput();
        self::validateRuleOnInput();
        self::validateRuleRequiredOneOnInput();

        $basicPoints = self::calculateBasicPoints();
        $plusPoints = self::calculatePlusPoints();

        return [
            $basicPoints,
            $plusPoints,
            $basicPoints + $plusPoints,
        ];
    }

    protected static function getRequiredRuleName(InputData $inputData): string
    {
        $valasztottSzak = $inputData->getValasztottSzak();

        return $valasztottSzak->getEgyetem()->value.
            $valasztottSzak->getKar()->value.
            $valasztottSzak->getSzak()->value;
    }

    protected static function getRequiredRule(InputData $inputData): string
    {
        return self::$rules[self::getRequiredRuleName($inputData)];
    }

    private static function calculateBasicPoints(): int
    {
        $findRequiredPoint = self::findRuleRequiredPoint();
        $findRuleRequiredOnePoint = self::findRuleRequiredOnePoint();

        return ($findRequiredPoint + $findRuleRequiredOnePoint) * 2;
    }

    private static function findRuleRequiredPoint(): int
    {
        /** @var RuleInterface $rule */
        $rule = self::getRequiredRule(self::$inputData);

        foreach (self::$inputData->getErettsegiEredmenyekCollection()->toArray() as $item) {
            /* @var ErettsegiEredmeny $item */
            if ($rule::getRequired() === $item->getTantargy()) {
                return $item->getEredmeny();
            }
        }

        return 0;
    }

    private static function findRuleRequiredOnePoint(): int
    {
        /** @var RuleInterface $rule */
        $rule = self::getRequiredRule(self::$inputData);

        /* @var ErettsegiEredmeny $larger */
        $larger = null;

        foreach (self::$inputData->getErettsegiEredmenyekCollection()->toArray() as $item) {
            /* @var ErettsegiEredmeny $item */
            if (
                (null === $larger || $larger->getEredmeny() < $item->getEredmeny())
            && (true === \in_array($item->getTantargy(), $rule::getRequiredOne(), true))
            ) {
                $larger = $item;
            }
        }

        return $larger->getEredmeny();
    }

    private static function calculatePlusPoints(): int
    {
        return 0;
    }
}
