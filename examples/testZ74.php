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
$std->CNPJ = '66291561000103';
$std->IE = '283305054';
$std->UF = 'PR';
$std->BRANCOS = null;

try {
    $z74 = new Z74($std);

    header("Content-Type: text/plain");
    echo "{$z74}";
} catch (\Exception $e) {
    echo $e->getMessage();
}
