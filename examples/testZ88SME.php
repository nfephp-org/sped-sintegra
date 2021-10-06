<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z88SME;

$std = new stdClass();
$std->CNPJ = '';
$std->MENSAGEM = '';
$std->BRANCOS = '';

try {
    $z88SME = new Z88SME($std);

    header("Content-Type: text/plain");
    echo "{$z88SME}";
} catch (\Exception $e) {
    echo $e->getMessage();
}
