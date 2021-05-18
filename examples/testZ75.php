<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z75;

$std = new stdClass();
$std->DT_INI = '20050502';
$std->DT_FIM = '20050502';
$std->CODIGO_PRODUTO = '1';
$std->CODIGO_NCM = '1234578';
$std->DESCRICAO = 'TESTE';
$std->UN = 'KG';
$std->ALIQUOTA_IPI = '0';
$std->ALIQUOTA_ICMS = '0';
$std->REDUCAO_BASE_ICMS = '0';
$std->VL_BC_ICMS = '0';

try {
    $z75 = new Z75($std);

    header("Content-Type: text/plain");
    echo "{$z75}";
} catch (\Exception $e) {
    echo $e->getMessage();
}
