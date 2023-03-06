<?php

declare(strict_types=1);

namespace Src\Entity\ValueObject;

use Src\Entity\Enumeration\Egyetem\Egyetem;
use Src\Entity\Enumeration\Egyetem\Kar;
use Src\Entity\Enumeration\Egyetem\Szak;

class ValasztottSzak
{
    private Egyetem $egyetem;
    private Kar $kar;
    private Szak $szak;

    public function setEgyetem(Egyetem $egyetem): self
    {
        $this->egyetem = $egyetem;

        return $this;
    }

    public function setKar(Kar $kar): self
    {
        $this->kar = $kar;

        return $this;
    }

    public function setSzak(Szak $szak): self
    {
        $this->szak = $szak;

        return $this;
    }

    public function getEgyetem(): Egyetem
    {
        return $this->egyetem;
    }

    public function getKar(): Kar
    {
        return $this->kar;
    }

    public function getSzak(): Szak
    {
        return $this->szak;
    }
}
