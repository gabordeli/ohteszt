<?php

declare(strict_types=1);
function dd($var, bool $die = true): void
{
    echo '<style>body{padding:0; margin:0;}</style><pre style="background-color:black; color:white; font-family:monospace; font-size:11px; padding:10px;">';
    var_dump($var);
    echo '</pre>';

    if (true === $die) {
        exit;
    }
}

function dump($var): void
{
    dd($var, false);
}
