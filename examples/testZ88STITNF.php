<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z88STITNF;

$std = new stdClass();
$std->CNPJ = '66291561000103';
$std->COD_MOD = '55';
$std->SERIE = '003';
$std->NUM_DOC = '000001';
$std->CFOP = '1403';
$std->CST = '010';
$std->NUMERO_ITEM = '001';
$std->DATA_ENTRADA = '20210803';
$std->CODIGO_PRODUTO = '00001' . str_repeat(' ', 55);
$std->QUANTIDADE = 1.0;
$std->VL_PRODUTO = 1.99;
$std->VL_DESCONTO = 0.0;
$std->VL_BC_ICMS_OP = 0.17;
$std->VL_BC_ICMS_ST = 0.0;
$std->ALIQUOTA_ICMS_ST = 0;
$std->ALIQUOTA_ICMS_OP = 17;
$std->VL_IPI = 0.0;
$std->CHAVE_NFE = str_repeat('0', 44);

try {
    $z88STITNF = new Z88STITNF($std);

    header("Content-Type: text/plain");
    echo "{$z88STITNF}";
} catch (\Exception $e) {
    echo $e->getMessage();
}
