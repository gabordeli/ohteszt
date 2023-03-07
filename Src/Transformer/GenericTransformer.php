<?php

declare(strict_types=1);

namespace Src\Transformer;

use Src\Entity\ValueObject\InputData;

abstract class GenericTransformer
{
    use TransformerValidatorTrait;

    protected static array $input;
    protected static array $output;

    protected static array $validators = [];

    public static function fromArray(array $array): InputData
    {
        static::$input = $array;

        self::validate();

        return static::transform();
    }

    abstract public static function transform();
}
