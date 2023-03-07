<?php

declare(strict_types=1);

namespace Src\Transformer\Validator;

use Src\Entity\Enumeration\Egyetem\Egyetem;
use Src\Entity\Enumeration\Egyetem\Kar;
use Src\Entity\Enumeration\Egyetem\Szak;
use Src\Entity\ValueObject\ValasztottSzak;

class ValasztottSzakValidator implements ValidatorInterface
{
    public const NAME = 'valasztott-szak';
    private const EGYETEM = 'egyetem';
    private const KAR = 'kar';
    private const SZAK = 'szak';
    private array $mustExistsFields = [
            self::EGYETEM, self::KAR, self::SZAK,
    ];

    public function validate(mixed $input): ValasztottSzak
    {
        GenericValidator::validate(array_keys($input), $this->mustExistsFields);

        return (new ValasztottSzak())
                    ->setEgyetem(Egyetem::tryFrom(GenericValidator::transformToEnumValue($input[self::EGYETEM])))
                    ->setKar(Kar::tryFrom(GenericValidator::transformToEnumValue($input[self::KAR])))
                    ->setSzak(Szak::tryFrom(GenericValidator::transformToEnumValue($input[self::SZAK])));
    }
}
