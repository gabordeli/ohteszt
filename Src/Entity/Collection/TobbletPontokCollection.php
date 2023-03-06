<?php

declare(strict_types=1);

namespace Src\Entity\Collection;

use src\Entity\ValueObject\TobbletPont;

class TobbletPontokCollection extends GenericCollection
{
    public function __construct(TobbletPont ...$values)
    {
        $this->values = $values;
    }
}
