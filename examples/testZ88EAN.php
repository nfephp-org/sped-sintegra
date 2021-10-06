<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z88EAN;

$std = new stdClass();
$std->VERSAO_EAN = '';
$std->CODIGO_PRODUTO = '';
$std->DESCRICAO = '';
$std->UN = '';
$std->CODIGO_BARRAS = '';
$std->BRANCOS = '';

try {
    $z88EAN = new Z88EAN($std);

    header("Content-Type: text/plain");
    echo "{$z88EAN}";
} catch (\Exception $e) {
    echo $e->getMessage();
}
