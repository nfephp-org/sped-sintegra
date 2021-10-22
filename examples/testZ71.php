<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z71;

$std = new stdClass();
$std->CNPJ_TOM = '99999090910270';
$std->IE_TOM = '283305054';
$std->DATA_EMISSAO = '20050502';
$std->UF_TOM = 'PR';
$std->COD_MOD = '01';
$std->SERIE = '1';
$std->SUB_SERIE = null;
$std->NUM_DOC = '1';
$std->UF_REM_DEST = 'PR';
$std->CNPJ_REM_DEST = '66291561000103';
$std->IE_REM_DEST = '283305054';
$std->DATA_EMISSAO_NF = '20050502';
$std->COD_MOD_NF = '55';
$std->SERIE_NF = '1';
$std->NUM_DOC_NF = '1000';
$std->VL_TOTAL = '100';
$std->BRANCOS = null;

try {
    $elem = new Z71($std);

    header("Content-Type: text/plain");
    echo "{$elem}";
    
    echo "\n";
    echo "\n";
    print_r($elem->errors);
    
} catch (\Exception $e) {
    echo $e->getMessage();
}
