<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z60I;

$std = new stdClass();
$std->DATA_EMISSAO = '20050502';
$std->NUM_FAB = '4224';
$std->COD_MOD = '01';
$std->NUM_DOC = '1';
$std->NUMERO_ITEM = '1';
$std->CODIGO_PRODUTO = '1';
$std->QUANTIDADE = '1';
$std->VL_PRODUTO = '10';
$std->VL_BC_ICMS = '10';
$std->ALIQUOTA = '4';
$std->VL_ICMS = '040';
$std->BRANCOS = null;

try {
    $z60M = new Z60I($std);

    header("Content-Type: text/plain");
    echo "{$z60M}";
} catch (\Exception $e) {
    echo $e->getMessage();
}
