<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z74;

$std = new stdClass();
$std->DATA_INVENTARIO = '20050502';
$std->CODIGO_PRODUTO = '1';
$std->QUANTIDADE = '1';
$std->VL_PRODUTO = '100';
$std->CODIGO_POSSE = '1';
$std->CNPJ = null;
$std->IE = null;
$std->UF = 'PR';
$std->BRANCOS = null;

try {
    
    $elem = new Z74($std);

    header("Content-Type: text/plain");
    echo "{$elem}";
    
    echo "\n";
    echo "\n";
    print_r($elem->errors);
    
} catch (\Exception $e) {
    echo $e->getMessage();
}
