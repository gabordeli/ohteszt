<?php

declare(strict_types=1);

namespace Src\Entity\ValueObject;

use Src\Entity\Collection\ErettsegiEredmenyekCollection;
use Src\Entity\Collection\TobbletPontokCollection;

class InputData
{
    protected ValasztottSzak $valasztottSzak;
    protected ErettsegiEredmenyekCollection $erettsegiEredmenyekCollection;
    protected TobbletPontokCollection $tobbletPontokCollection;

    public function setValasztottSzak(ValasztottSzak $valasztottSzak): self
    {
        $this->valasztottSzak = $valasztottSzak;

        return $this;
    }

    public function setErettsegiEredmenyekCollection(ErettsegiEredmenyekCollection $erettsegiEredmenyekCollection): self
    {
        $this->erettsegiEredmenyekCollection = $erettsegiEredmenyekCollection;

        return $this;
    }

    public function setTobbletPontokCollection(TobbletPontokCollection $tobbletPontokCollection): self
    {
        $this->tobbletPontokCollection = $tobbletPontokCollection;

        return $this;
    }

    public function getValasztottSzak(): ValasztottSzak
    {
        return $this->valasztottSzak;
    }

    public function getErettsegiEredmenyekCollection(): ErettsegiEredmenyekCollection
    {
        return $this->erettsegiEredmenyekCollection;
    }

    public function getTobbletPontokCollection(): TobbletPontokCollection
    {
        return $this->tobbletPontokCollection;
    }
}
