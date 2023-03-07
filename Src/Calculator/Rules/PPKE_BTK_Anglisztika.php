<?php

declare(strict_types=1);

namespace Src\Calculator\Rules;

use Src\Entity\Enumeration\Egyetem\Egyetem;
use Src\Entity\Enumeration\Egyetem\Kar;
use Src\Entity\Enumeration\Egyetem\Szak;
use Src\Entity\Enumeration\Szakkozepiskola\Tantargy;

class PPKE_BTK_Anglisztika extends GenericRule
{
    use RuleTrait;

    public const NAME = Egyetem::PPKE->value.Kar::BTK->value.Szak::ANGLISZTIKA->value;
    protected static Tantargy $required = Tantargy::ANGOL_NYELV;
    protected static array $requiredOne = [
        Tantargy::FRANCIA,
        Tantargy::NEMET,
        Tantargy::OLASZ,
        Tantargy::OROSZ,
        Tantargy::SPANYOL,
        Tantargy::TORTENELEM,
    ];
}
