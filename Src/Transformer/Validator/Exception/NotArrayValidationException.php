<?php

declare(strict_types=1);

namespace Src\Transformer\Validator\Exception;

class NotArrayValidationException extends \Exception
{
    public static function create(string $message, mixed $data): self
    {
        return new self(sprintf(
            '[%s]. %s [data: %s]',
            __CLASS__,
            $message,
            json_encode($data, \JSON_THROW_ON_ERROR)
        ));
    }
}
