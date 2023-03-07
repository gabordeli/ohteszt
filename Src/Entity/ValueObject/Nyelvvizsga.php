<?php

declare(strict_types=1);

namespace Src\Entity\ValueObject;

use Src\Entity\Enumeration\Nyelvvizsga\Kategoria;
use Src\Entity\Enumeration\Nyelvvizsga\Nyelv;
use Src\Entity\Enumeration\Nyelvvizsga\Tipus;

class Nyelvvizsga
{
    private Kategoria $kategoria;
    private Tipus $tipus;
    private Nyelv $nyelv;

    public function setKategoria(Kategoria $kategoria): self
    {
        $this->kategoria = $kategoria;

        return $this;
    }

    public function setTipus(Tipus $tipus): self
    {
        $this->tipus = $tipus;

        return $this;
    }

    public function setNyelv(Nyelv $nyelv): self
    {
        $this->nyelv = $nyelv;

        return $this;
    }

    public function getKategoria(): Kategoria
    {
        return $this->kategoria;
    }

    public function getTipus(): Tipus
    {
        return $this->tipus;
    }

    public function getNyelv(): Nyelv
    {
        return $this->nyelv;
    }
}
