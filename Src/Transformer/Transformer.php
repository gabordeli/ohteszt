<?php

declare(strict_types=1);

namespace Src\Transformer;

use Src\Entity\ValueObject\InputData;
use Src\Transformer\Validator\ErettsegiEredmenyekValidator;
use Src\Transformer\Validator\TobbletpontokValidator;
use Src\Transformer\Validator\ValasztottSzakValidator;

class Transformer extends GenericTransformer
{
    protected static array $validators = [
        ValasztottSzakValidator::NAME => ValasztottSzakValidator::class,
        ErettsegiEredmenyekValidator::NAME => ErettsegiEredmenyekValidator::class,
        TobbletpontokValidator::NAME => TobbletpontokValidator::class,
    ];

    public static function transform(): InputData
    {
        return (new InputData())
                ->setValasztottSzak(self::$output[ValasztottSzakValidator::NAME])
                ->setErettsegiEredmenyekCollection(self::$output[ErettsegiEredmenyekValidator::NAME])
                ->setTobbletPontokCollection(self::$output[TobbletpontokValidator::NAME]);
    }
}
