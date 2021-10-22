<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z61R;

$std = new stdClass();
$std->MESTRE = 'R';
$std->PERIODO_EMISSAO = '052020';
$std->COD_PRODUTO = '1';
$std->QUANTIDADE = '2';
$std->VALOR_PRODUTO = '100';
$std->VL_BC_ICMS = '100';
$std->ALIQUOTA = '0';
$std->BRANCOS = null;

try {
    
    $elem = new Z61R($std);

    header("Content-Type: text/plain");
    echo "{$elem}";
    
    echo "\n";
    echo "\n";
    print_r($elem->errors);
    
} catch (\Exception $e) {
    echo $e->getMessage();
}
