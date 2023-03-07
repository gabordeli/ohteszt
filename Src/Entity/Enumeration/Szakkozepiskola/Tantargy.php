<?php

declare(strict_types=1);

namespace Src\Entity\Enumeration\Szakkozepiskola;

enum Tantargy: string
{
    case MAGYAR_NYELV_ES_IRODALOM = 'MAGYAR_NYELV_ES_IRODALOM';
    case TORTENELEM = 'TORTENELEM';
    case MATEMATIKA = 'MATEMATIKA';
    case ANGOL_NYELV = 'ANGOL_NYELV';
    case INFORMATIKA = 'INFORMATIKA';
    case FIZIKA = 'FIZIKA';
    case BIOLOGIA = 'BIOLOGIA';
    case KEMIA = 'KEMIA';
    case FRANCIA = 'FRANCIA';
    case NEMET = 'NEMET';
    case OLASZ = 'OLASZ';
    case OROSZ = 'OROSZ';
    case SPANYOL = 'SPANYOL';
}
