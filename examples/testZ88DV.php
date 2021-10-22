<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z88DV;

$std = new stdClass();
$std->DATA_EMISSAO = '20201212';
$std->SERIE = '1';
$std->NUM_DOC = '111';
$std->NUM_COO = '12345';
$std->DATA_EMISSAO_CUPOM = '20201212';
$std->NUMERO_ITEM = '1';
$std->CODIGO_PRODUTO = '123456';
$std->QUANTIDADE = '10';
$std->RELATORIO_NUM_COO = '1';
$std->RELATORIO_DATA_EMISSAO = '20201212';
$std->NUM_FAB = '12345';
$std->CNPJ = '99999999999999';
$std->VL_UNITARIO = '100';
$std->VL_BC_ICMS = '100';
$std->VL_ICMS = '18';

try {
    
    $elem = new Z88DV($std);

    header("Content-Type: text/plain");
    echo "{$elem}";
    
    echo "\n";
    echo "\n";
    print_r($elem->errors);
    
} catch (\Exception $e) {
    echo $e->getMessage();
}
