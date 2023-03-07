<?php

declare(strict_types=1);

namespace Src\Entity\Collection;

use src\Entity\ValueObject\Nyelvvizsga;

class NylvvizsgakCollection extends GenericCollection
{
    public function __construct(Nyelvvizsga ...$values)
    {
        $this->values = $values;
    }
}
