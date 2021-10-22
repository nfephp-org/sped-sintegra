<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z88EAN;

$std = new stdClass();
$std->VERSAO_EAN = '8';
$std->CODIGO_PRODUTO = '1234';
$std->DESCRICAO = 'SEILA';
$std->UN = '1';
$std->CODIGO_BARRAS = '78935761';
$std->BRANCOS = '';

try {
    $z88EAN = new Z88EAN($std);

    header("Content-Type: text/plain");
    echo "{$z88EAN}";
    
    echo "\n";
    echo "\n";
    print_r($z88EAN->errors);
} catch (\Exception $e) {
    echo $e->getMessage();
}
