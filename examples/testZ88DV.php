<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z88DV;

$std = new stdClass();
$std->DATA_EMISSAO = '';
$std->SERIE = '';
$std->NUM_DOC = '';
$std->NUM_COO = '';
$std->DATA_EMISSAO_CUPOM = '';
$std->NUMERO_ITEM = '';
$std->CODIGO_PRODUTO = '';
$std->QUANTIDADE = '';
$std->RELATORIO_NUM_COO = '';
$std->RELATORIO_DATA_EMISSAO = '';
$std->NUM_FAB = '';
$std->CNPJ = '';
$std->VL_UNITARIO = '';
$std->VL_BC_ICMS = '';
$std->VL_ICMS = '';

try {
    $z88DV = new Z88DV($std);

    header("Content-Type: text/plain");
    echo "{$z88DV}";
} catch (\Exception $e) {
    echo $e->getMessage();
}
