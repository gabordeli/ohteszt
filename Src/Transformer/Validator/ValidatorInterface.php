<?php

declare(strict_types=1);

namespace Src\Transformer\Validator;

interface ValidatorInterface
{
    public function validate(mixed $input);
}
