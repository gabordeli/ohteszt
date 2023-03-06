<?php

declare(strict_types=1);

namespace Src\Entity\Collection;

abstract class GenericCollection
{
    protected array $values;

    public function toArray(): array
    {
        $out = [];

        foreach ($this->values as $value) {
            $out[] = $value;
        }

        return $out;
    }

    public function count(): int
    {
        return \count($this->values);
    }

    public function isEmpty(): bool
    {
        return 0 === $this->count();
    }
}
