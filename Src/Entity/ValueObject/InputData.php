<?php

declare(strict_types=1);

namespace Src\Entity\ValueObject;

use Src\Entity\Collection\ErettsegiEredmenyekCollection;
use Src\Entity\Collection\NylvvizsgakCollection;

class InputData
{
    protected ValasztottSzak $valasztottSzak;
    protected ErettsegiEredmenyekCollection $erettsegiEredmenyekCollection;
    protected NylvvizsgakCollection $nyelvvizsgakCollection;

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

    public function setNyelvvizsgakCollection(NylvvizsgakCollection $nyelvvizsgakCollection): self
    {
        $this->nyelvvizsgakCollection = $nyelvvizsgakCollection;

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

    public function getNyelvvizsgakCollection(): NylvvizsgakCollection
    {
        return $this->nyelvvizsgakCollection;
    }
}
