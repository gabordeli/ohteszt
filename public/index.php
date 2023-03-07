<?php

declare(strict_types=1);

ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');
ini_set('log_errors', 'On');
ini_set('html_errors', 'On');
// error_reporting(\E_ALL | \E_STRICT );
error_reporting(\E_ALL & ~\E_NOTICE & ~\E_DEPRECATED & ~\E_WARNING);

include __DIR__.'/../vendor/autoload.php';

use Src\Transformer\Transformer;
use Src\Calculator\Calculator;

try {
    $exampleData1 = require 'example1.php';
    $inputData1 = Transformer::fromArray($exampleData1);

    Calculator::calculate($inputData1);

    dd($inputData1);



}catch (\Exception $e) {

    dd($e->getMessage());

}



