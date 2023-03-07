<?php

declare(strict_types=1);

namespace Src\Transformer\Validator\Exception;

class ValidatorCountException extends ValidationException
{
    public static function create(string $class): self
    {
        return new self(sprintf(
            '[%s]. Nem tartalmaz egyetlen validatort sem => %s',
            __CLASS__,
            $class
        ));
    }
}
