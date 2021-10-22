<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z88STES;

$std = new stdClass();
$std->CNPJ = '99999090910270';
$std->DATA_INVENTARIO = '20201231';
$std->CODIGO_PRODUTO = '123456';
$std->QUANTIDADE = '10';
$std->VL_ICMS_ST = '150.26';
$std->VL_ICMS_OP = '13.45';
$std->BRANCOS = '';

try {
    
    $elem = new Z88STES($std);

    header("Content-Type: text/plain");
    echo "{$elem}";
    
    echo "\n";
    echo "\n";
    print_r($elem->errors);
    
} catch (\Exception $e) {
    echo $e->getMessage();
}
