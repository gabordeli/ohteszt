<?php

declare(strict_types=1);

namespace Src\Transformer\Validator;

use Src\Transformer\Validator\Exception\GenericValidationException;

class GenericValidator
{
    public static function validate(array $input, array $mustExistsKeys): void
    {
        foreach ($mustExistsKeys as $key) {
            if (false === \in_array($key, $input, true)) {
                throw GenericValidationException::create($key, $input);
            }
        }
    }

    public static function transformToEnumValue(string $input): string
    {
        $Str1 = ['Ú', 'ú', 'á', 'é', 'í', 'ü', 'ö', 'ű', 'ó', 'ő', 'Á', 'É', 'Í', 'Ü', 'Ű', 'Ó', 'Ö', 'Ő', ' '];
        $Str2 = ['U', 'u', 'a', 'e', 'i', 'u', 'o', 'u', 'o', 'o', 'A', 'E', 'I', 'U', 'U', 'O', 'O', 'O', '_'];
        $tmp = str_replace($Str1, $Str2, $input);

        return strtoupper($tmp);
    }

    public static function transformToEnumValueFromPercent(string $input): string
    {
        $tmp = self::transformToEnumValue($input);

        return str_replace('%', '', $tmp);
    }
}
