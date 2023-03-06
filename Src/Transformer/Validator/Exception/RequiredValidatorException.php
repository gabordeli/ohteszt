<?php

declare(strict_types=1);

namespace Src\Transformer\Validator\Exception;

class RequiredValidatorException extends ValidationException
{
    public static function create(string $class, string $required): self
    {
        return new self(sprintf(
            '[%s]. Az $input tartalmaz olyan adatot [%s] amihez a validátor nincs betöltve! ',
            __CLASS__,
            $required
        ));
    }
}
