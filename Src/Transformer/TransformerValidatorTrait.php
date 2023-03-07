<?php

declare(strict_types=1);

namespace Src\Transformer;

use Src\Transformer\Validator\Exception\EmptyInputException;
use Src\Transformer\Validator\Exception\InvalidValidatorException;
use Src\Transformer\Validator\Exception\RequiredValidatorException;
use Src\Transformer\Validator\Exception\ValidatorCountException;
use Src\Transformer\Validator\ValidatorInterface;

trait TransformerValidatorTrait
{
    public static function validate(): void
    {
        self::validateInputSize();
        self::validateValidatorsCount();
        self::validateRequiredValidatorForInput();

        foreach (static::$validators as $validatorClass) {
            /** @var ValidatorInterface $validator */
            $validator = new $validatorClass();

            if (false === is_subclass_of($validator, ValidatorInterface::class)) {
                throw InvalidValidatorException::create(static::class);
            }

            static::$output[$validatorClass::NAME] = $validator->validate(static::$input[$validatorClass::NAME]);
        }
    }

    private static function validateInputSize(): void
    {
        if (0 === \count(static::$input)) {
            throw EmptyInputException::create(static::class);
        }
    }

    private static function validateRequiredValidatorForInput(): void
    {
        foreach (static::$input as $key => $item) {
            if (false === \array_key_exists($key, static::$validators)) {
                throw RequiredValidatorException::create($key);
            }
        }
    }

    private static function validateValidatorsCount(): void
    {
        if (0 === \count(static::$validators)) {
            throw ValidatorCountException::create(static::class);
        }
    }
}
