<?php

declare(strict_types=1);

namespace Src\Transformer\Exception;

class TransformerException extends \Exception
{
    public static function create(string $transformer): self
    {
        return new self(sprintf(
            '[%s]. Üres a $validators tömb: %s',
            __CLASS__,
            $transformer
        ));
    }
}
