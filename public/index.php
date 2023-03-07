<?php

declare(strict_types=1);

ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');
ini_set('log_errors', 'On');
ini_set('html_errors', 'On');
// error_reporting(\E_ALL | \E_STRICT );
error_reporting(\E_ALL & ~\E_NOTICE & ~\E_DEPRECATED & ~\E_WARNING);

include __DIR__.'/../vendor/autoload.php';

use Src\Calculator\Calculator;
use Src\Transformer\Transformer;

foreach (range(1, 4) as $key) {
    try {
        $exampleData = require "example{$key}.php";
        $inputData = Transformer::fromArray($exampleData);
        [$basicPoints, $plusPoints, $sum] = Calculator::calculate($inputData);

        dump($basicPoints);
    } catch (\Exception $e) {
        dump(sprintf('Hiba a(z) %s. bemeneti adat kiértékelése közben: %s',
            $key,
            $e->getMessage()
        ));
    }
}
