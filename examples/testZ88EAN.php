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
    
    $elem = new Z88EAN($std);

    header("Content-Type: text/plain");
    echo "{$elem}";
    
    echo "\n";
    echo "\n";
    print_r($elem->errors);
    
} catch (\Exception $e) {
    echo $e->getMessage();
}
