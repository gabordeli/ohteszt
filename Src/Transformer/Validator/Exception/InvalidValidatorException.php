<?php

declare(strict_types=1);

namespace Src\Transformer\Validator\Exception;

use Src\Transformer\Validator\ValidatorInterface;

class InvalidValidatorException extends ValidationException
{
    public static function create(string $class): self
    {
        return new self(sprintf(
            '[%s]. A validator nem tartalmazza a %s interface-t => %s',
            __CLASS__,
            ValidatorInterface::class,
            $class
        ));
    }
}
