<?php

declare(strict_types=1);

namespace Src\Calculator;

use Src\Calculator\Rules\ELTE_IK_ProgramtervezoInformatikus;
use Src\Calculator\Rules\PPKE_BTK_Anglisztika;
use Src\Calculator\Rules\RuleInterface;
use Src\Entity\Enumeration\Nyelvvizsga\Tipus as NyelvvizsgaTipus;
use Src\Entity\Enumeration\Szakkozepiskola\Tantargy;
use Src\Entity\Enumeration\Szakkozepiskola\Tipus;
use Src\Entity\ValueObject\ErettsegiEredmeny;
use Src\Entity\ValueObject\InputData;
use Src\Entity\ValueObject\Nyelvvizsga;

class Calculator
{
    use CalculatorValidatorTrait;

    private static int $minimumPoint = 20;
    private static int $advanceLevelPoint = 50;
    private static array $languageExamPoints = [
        NyelvvizsgaTipus::B2->value => 28,
        NyelvvizsgaTipus::C1->value => 50,
    ];

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
        self::validateMinimumPointsOnInput();
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

    private static function getRequiredRuleName(): string
    {
        $valasztottSzak = self::$inputData->getValasztottSzak();

        return $valasztottSzak->getEgyetem()->value.
            $valasztottSzak->getKar()->value.
            $valasztottSzak->getSzak()->value;
    }

    private static function getRequiredRule(): string
    {
        return self::$rules[self::getRequiredRuleName()];
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
        $rule = self::getRequiredRule();

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
        $rule = self::getRequiredRule();

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
        $advanceLevelsPoint = self::findAdvancedLevelsPoint();
        $languageExamsPoints = self::findLanguageExams();

        $sum = $advanceLevelsPoint + $languageExamsPoints;

        return min($sum, 100);
    }

    private static function findAdvancedLevelsPoint(): int
    {
        $points = 0;

        foreach (self::$inputData->getErettsegiEredmenyekCollection()->toArray() as $item) {
            /* @var ErettsegiEredmeny $item */
            if (Tipus::EMELT === $item->getTipus()) {
                $points += self::$advanceLevelPoint;
            }
        }

        return $points;
    }

    private static function findLanguageExams(): int
    {
        $points = 0;

        foreach (self::$inputData->getNyelvvizsgakCollection()->toArray() as $item) {
            /* @var Nyelvvizsga $item */
            if (
                true === \array_key_exists($item->getTipus()->value, static::$languageExamPoints)
            && $points < static::$languageExamPoints[$item->getTipus()->value]
            ) {
                $points = static::$languageExamPoints[$item->getTipus()->value];
            }
        }

        return $points;
    }
}
