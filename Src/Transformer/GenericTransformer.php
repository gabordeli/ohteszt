<?php

declare(strict_types=1);

namespace Src\Transformer;

use Src\Entity\ValueObject\InputData;
use Src\Transformer\Validator\ValidatorTrait;

abstract class GenericTransformer
{
    use ValidatorTrait;

    protected static array $input;
    protected static array $output;

    protected static array $validators = [];

    public static function fromArray(array $array): InputData
    {
        static::$input = $array;

        self::validate();

        return static::handleOutput();
    }

    abstract public static function handleOutput();
}
