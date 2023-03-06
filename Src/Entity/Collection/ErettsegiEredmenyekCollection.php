<?php

declare(strict_types=1);

namespace Src\Entity\Collection;

use Src\Entity\ValueObject\ErettsegiEredmeny;

class ErettsegiEredmenyekCollection extends GenericCollection
{
    public function __construct(ErettsegiEredmeny ...$values)
    {
        $this->values = $values;
    }
}
