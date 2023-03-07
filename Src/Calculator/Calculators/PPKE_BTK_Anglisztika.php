<?php

declare(strict_types=1);

namespace Src\Calculator\Calculators;

use Src\Entity\Enumeration\Egyetem\Egyetem;
use Src\Entity\Enumeration\Egyetem\Kar;
use Src\Entity\Enumeration\Egyetem\Szak;
use Src\Entity\Enumeration\Szakkozepiskola\Tantargy;

class PPKE_BTK_Anglisztika
{
    public const NAME = Egyetem::PPKE->value.Kar::BTK->value.Szak::ANGLISZTIKA->value;
    public Tantargy $required = Tantargy::ANGOL_NYELV;
    public array $requiredOne = [
        Tantargy::FRANCIA,
        Tantargy::NEMET,
        Tantargy::OLASZ,
        Tantargy::OROSZ,
        Tantargy::SPANYOL,
        Tantargy::TORTENELEM,
    ];
}