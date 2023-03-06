<?php

declare(strict_types=1);

namespace Src\Transformer\Validator\Exception;

class EmptyInputException extends ValidationException
{
    public static function create(string $class): self
    {
        return new self(sprintf(
            '[%s]. Az $input üres, így a validálás nem fog folytatódni!',
            __CLASS__
        ));
    }
}
