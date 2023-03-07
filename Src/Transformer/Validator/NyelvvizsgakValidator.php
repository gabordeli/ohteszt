<?php

declare(strict_types=1);

namespace Src\Transformer\Validator;

use Src\Entity\Collection\NylvvizsgakCollection;
use Src\Entity\Enumeration\Nyelvvizsga\Kategoria;
use Src\Entity\Enumeration\Nyelvvizsga\Nyelv;
use Src\Entity\Enumeration\Nyelvvizsga\Tipus;
use Src\Entity\ValueObject\Nyelvvizsga;
use Src\Transformer\Validator\Exception\NotArrayValidationException;

class NyelvvizsgakValidator implements ValidatorInterface
{
    public const NAME = 'tobbletpontok';
    private const KATEGORIA = 'kategoria';
    private const TIPUS = 'tipus';
    private const NYELV = 'nyelv';

    private array $mustExistsFields = [
        self::KATEGORIA, self::TIPUS, self::NYELV,
    ];

    public function validate(mixed $input): NylvvizsgakCollection
    {
        $this->validateInputAsArray($input);
        $this->validateArrayItems($input);

        return $this->create($input);
    }

    protected function validateInputAsArray(array $input): void
    {
        if (false === \is_array($input)) {
            throw NotArrayValidationException::create('A megadott $input nem tömbként lett megadva!', $input);
        }
    }

    protected function validateArrayItems(array $input): void
    {
        foreach ($input as $item) {
            GenericValidator::validate(array_keys($item), $this->mustExistsFields);
        }
    }

    protected function create(array $input): NylvvizsgakCollection
    {
        $out = [];

        foreach ($input as $item) {
            $out[] = (new Nyelvvizsga())
                ->setKategoria(Kategoria::tryFrom(GenericValidator::transformToEnumValue($item[self::KATEGORIA])))
                ->setTipus(Tipus::tryFrom(GenericValidator::transformToEnumValue($item[self::TIPUS])))
                ->setNyelv(Nyelv::tryFrom(GenericValidator::transformToEnumValue($item[self::NYELV])));
        }

        return new NylvvizsgakCollection(...$out);
    }
}
