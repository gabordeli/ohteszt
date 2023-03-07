<?php

declare(strict_types=1);

namespace Src\Transformer\Validator\Exception;

class GenericValidationException extends ValidationException
{
    public static function create(string $field, mixed $data): self
    {
        return new self(sprintf(
            '[%s]. A megadott adat nem tartalmaz egy a validáláshoz szükséges mezőt: %s. [data: %s]',
            __CLASS__,
            $field,
            json_encode($data, \JSON_THROW_ON_ERROR)
        ));
    }
}
