<?php

declare(strict_types=1);

namespace Src\Entity\ValueObject;

use Src\Entity\Enumeration\Szakkozepiskola\Tantargy;
use Src\Entity\Enumeration\Szakkozepiskola\Tipus;

class ErettsegiEredmeny
{
    private Tantargy $tantargy;
    private Tipus $tipus;
    private int $eredmeny;

    public function getTantargy(): Tantargy
    {
        return $this->tantargy;
    }

    public function getTipus(): Tipus
    {
        return $this->tipus;
    }

    public function getEredmeny(): int
    {
        return $this->eredmeny;
    }

    public function setTipus(Tipus $tipus): self
    {
        $this->tipus = $tipus;

        return $this;
    }

    public function setEredmeny(int $eredmeny): self
    {
        $this->eredmeny = $eredmeny;

        return $this;
    }

    public function setTantargy(Tantargy $tantargy): self
    {
        $this->tantargy = $tantargy;

        return $this;
    }
}
