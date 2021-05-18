<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z61;

$std = new stdClass();
$std->BRANCOS_1 = null;
$std->BRANCOS_2 = null;
$std->DATA_EMISSAO = '20050502';
$std->COD_MOD = '01';
$std->SERIE = '1';
$std->SUB_SERIE = null;
$std->NUM_INICIAL = '4';
$std->NUM_FINAL = '4';
$std->VL_TOTAL = '100';
$std->VL_BC_ICMS = '100';
$std->VL_ICMS = '4';
$std->ISENTO_NTRIBUTADO = '0';
$std->OUTRAS_DESPESAS = '0';
$std->ALIQUOTA = '0';
$std->BRANCOS_3 = null;

try {
    $z60M = new Z61($std);

    header("Content-Type: text/plain");
    echo "{$z60M}";
} catch (\Exception $e) {
    echo $e->getMessage();
}
