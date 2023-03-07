<?php

declare(strict_types=1);

namespace Src\Calculator\Calculators;

use Src\Entity\Enumeration\Egyetem\Egyetem;
use Src\Entity\Enumeration\Egyetem\Kar;
use Src\Entity\Enumeration\Egyetem\Szak;
use Src\Entity\Enumeration\Szakkozepiskola\Tantargy;

class ELTE_IK_ProgramtervezoInformatikusCalculator
{
    public const NAME = Egyetem::ELTE->value.Kar::IK->value.Szak::PROGRAMTERVEZO_INFORMATIKUS->value;
    public Tantargy $required = Tantargy::MATEMATIKA;
    public array $requiredOne = [
        Tantargy::BIOLOGIA,
        Tantargy::FIZIKA,
        Tantargy::INFORMATIKA,
        Tantargy::KEMIA,
    ];
}