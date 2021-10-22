<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z88SME;

$std = new stdClass();
$std->CNPJ = '99999090910270';
$std->MENSAGEM = 'Sem Movimento de Entradas';
$std->BRANCOS = '';

try {
    
    $elem = new Z88SME($std);

    header("Content-Type: text/plain");
    echo "{$elem}";
    
    echo "\n";
    echo "\n";
    print_r($elem->errors);
    
} catch (\Exception $e) {
    echo $e->getMessage();
}
