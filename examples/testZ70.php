<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z70;

$std = new stdClass();
$std->CNPJ = '99999090910270';
$std->IE = '283305054';
$std->DATA_EMISSAO = '20050502';
$std->UF = 'PR';
$std->COD_MOD = '01';
$std->SERIE = '1';
$std->SUB_SERIE = null;
$std->NUM_DOC = '1';
$std->CFOP = '5102';
$std->VL_TOTAL = '100';
$std->VL_BC_ICMS = '100';
$std->VL_ICMS = '0';
$std->ISENTA_NTRIBUTADA = '0';
$std->OUTRAS = '0';
$std->MOD_FRETE = '2';
$std->SITUACAO = 'S';

try {
    
    $elem = new Z70($std);

    header("Content-Type: text/plain");
    echo "{$elem}";
    
    echo "\n";
    echo "\n";
    print_r($elem->errors);
    
} catch (\Exception $e) {
    echo $e->getMessage();
}
