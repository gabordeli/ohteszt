<?php

declare(strict_types=1);

namespace Src\Entity\Collection;

use Src\Entity\Enumeration\Szakkozepiskola\Tantargy;

class TantargyCollection extends GenericCollection
{
    public function __construct(Tantargy ...$values)
    {
        $this->values = $values;
    }
}
