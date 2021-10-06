<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z88STES;

$std = new stdClass();
$std->CNPJ = '';
$std->DATA_INVENTARIO = '';
$std->CODIGO_PRODUTO = '';
$std->QUANTIDADE = '';
$std->VL_ICMS_ST = '';
$std->VL_ICMS_OP = '';
$std->BRANCOS = '';

try {
    $z88STES = new Z88STES($std);

    header("Content-Type: text/plain");
    echo "{$z88STES}";
} catch (\Exception $e) {
    echo $e->getMessage();
}
