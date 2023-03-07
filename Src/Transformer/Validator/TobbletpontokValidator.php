<?php

declare(strict_types=1);

namespace Src\Transformer\Validator;

use Src\Entity\Collection\TobbletPontokCollection;
use Src\Entity\Enumeration\Tobbletpont\Kategoria;
use Src\Entity\Enumeration\Tobbletpont\Nyelv;
use Src\Entity\Enumeration\Tobbletpont\Tipus;
use Src\Entity\ValueObject\TobbletPont;
use Src\Transformer\Validator\Exception\NotArrayValidationException;

class TobbletpontokValidator implements ValidatorInterface
{
    public const NAME = 'tobbletpontok';
    private const KATEGORIA = 'kategoria';
    private const TIPUS = 'tipus';
    private const NYELV = 'nyelv';

    private array $mustExistsFields = [
        self::KATEGORIA, self::TIPUS, self::NYELV,
    ];

    public function validate(mixed $input): TobbletPontokCollection
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

    protected function create(array $input): TobbletPontokCollection
    {
        $out = [];

        foreach ($input as $item) {
            $out[] = (new TobbletPont())
                ->setKategoria(Kategoria::tryFrom(GenericValidator::transformToEnumValue($item[self::KATEGORIA])))
                ->setTipus(Tipus::tryFrom(GenericValidator::transformToEnumValue($item[self::TIPUS])))
                ->setNyelv(Nyelv::tryFrom(GenericValidator::transformToEnumValue($item[self::NYELV])));
        }

        return new TobbletPontokCollection(...$out);
    }
}
