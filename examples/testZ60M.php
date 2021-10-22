<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z60M;

$std = new stdClass();
$std->DATA_EMISSAO = '20050502';
$std->NUM_FAB = '4224';
$std->NUMERO_SEQ = '1';
$std->COD_MOD = '01';
$std->NUMERO_CONTADOR_INICIO_DIA = '1';
$std->NUMERO_CONTADOR_FINAL_DIA = '99999';
$std->NUMERO_CONTADOR_REDUCAO_Z = '1';
$std->NUMERO_CONTADOR_REINICIO_OP = '101';
$std->VL_TOTAL_BRUTO = '1000';
$std->VL_TOTAL_GERAL = '1000';
$std->BRANCOS = null;

try {
    
    $elem = new Z60M($std);

    header("Content-Type: text/plain");
    echo "{$elem}";
    
    echo "\n";
    echo "\n";
    print_r($elem->errors);
    
} catch (\Exception $e) {
    echo $e->getMessage();
}
