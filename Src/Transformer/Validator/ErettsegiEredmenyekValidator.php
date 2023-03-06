<?php

declare(strict_types=1);

namespace Src\Transformer\Validator;

use Src\Entity\Collection\ErettsegiEredmenyekCollection;
use Src\Entity\Enumeration\Szakkozepiskola\Tantargy;
use Src\Entity\Enumeration\Szakkozepiskola\Tipus;
use Src\Entity\ValueObject\ErettsegiEredmeny;
use Src\Transformer\Validator\Exception\NotArrayValidationException;

class ErettsegiEredmenyekValidator implements ValidatorInterface
{
    public const NAME = 'erettsegi-eredmenyek';

    private const NEV = 'nev';
    private const TIPUS = 'tipus';
    private const EREDMENY = 'eredmeny';

    private array $mustExistsFields = [
        self::NEV, self::TIPUS, self::EREDMENY,
    ];

    public function validate(mixed $input): ErettsegiEredmenyekCollection
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

    protected function create(array $input): ErettsegiEredmenyekCollection
    {
        $out = [];

        foreach ($input as $item) {
            $out[] = (new ErettsegiEredmeny())
                ->setTantargy(Tantargy::tryFrom(GenericValidator::transformToEnumValue($item[self::NEV])))
                ->setTipus(Tipus::tryFrom(GenericValidator::transformToEnumValue($item[self::TIPUS])))
                ->setEredmeny((int) GenericValidator::transformToEnumValueFromPercent($item[self::EREDMENY]));
        }

        return new ErettsegiEredmenyekCollection(...$out);
    }
}
