<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z76;

$std = new stdClass();
$std->CNPJ = '66291561000103';
$std->IE = '283305054';
$std->COD_MOD = '01';
$std->SERIE = '1';
$std->SUB_SERIE = null;
$std->NUM_DOC = '1';
$std->CFOP = '5102';
$std->TIPO_RECEITA = '2';
$std->DATA_EMISSAO = '20050502';
$std->UF = 'PR';
$std->VL_TOTAL = '100';
$std->VL_BC_ICMS = '100';
$std->VL_ICMS = '10';
$std->ISENTA_NTRIBUTADA = '0';
$std->OUTRAS = '0';
$std->ALIQUOTA = '0';
$std->SITUACAO = 'S';

try {
    $z76 = new Z76($std);

    header("Content-Type: text/plain");
    echo "{$z76}";
} catch (\Exception $e) {
    echo $e->getMessage();
}
