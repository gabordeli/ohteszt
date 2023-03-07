<?php

declare(strict_types=1);

namespace Src\Transformer;

use Src\Entity\ValueObject\InputData;
use Src\Transformer\Validator\ErettsegiEredmenyekValidator;
use Src\Transformer\Validator\NyelvvizsgakValidator;
use Src\Transformer\Validator\ValasztottSzakValidator;

class Transformer extends GenericTransformer
{
    protected static array $validators = [
        ValasztottSzakValidator::NAME => ValasztottSzakValidator::class,
        ErettsegiEredmenyekValidator::NAME => ErettsegiEredmenyekValidator::class,
        NyelvvizsgakValidator::NAME => NyelvvizsgakValidator::class,
    ];

    public static function transform(): InputData
    {
        return (new InputData())
                ->setValasztottSzak(self::$output[ValasztottSzakValidator::NAME])
                ->setErettsegiEredmenyekCollection(self::$output[ErettsegiEredmenyekValidator::NAME])
                ->setNyelvvizsgakCollection(self::$output[NyelvvizsgakValidator::NAME]);
    }
}
