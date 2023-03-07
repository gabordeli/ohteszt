<?php

declare(strict_types=1);

namespace Src\Calculator\Rules;

use Src\Entity\Enumeration\Egyetem\Egyetem;
use Src\Entity\Enumeration\Egyetem\Kar;
use Src\Entity\Enumeration\Egyetem\Szak;
use Src\Entity\Enumeration\Szakkozepiskola\Tantargy;

class ELTE_IK_ProgramtervezoInformatikus extends GenericRule
{
    use RuleTrait;

    public const NAME = Egyetem::ELTE->value.Kar::IK->value.Szak::PROGRAMTERVEZO_INFORMATIKUS->value;
    protected static Tantargy $required = Tantargy::MATEMATIKA;
    protected static array $requiredOne = [
        Tantargy::BIOLOGIA,
        Tantargy::FIZIKA,
        Tantargy::INFORMATIKA,
        Tantargy::KEMIA,
    ];
}
