<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z88SMS;

$std = new stdClass();
$std->CNPJ = '';
$std->MENSAGEM = '';
$std->BRANCOS = '';

try {
    $z88SMS = new Z88SMS($std);

    header("Content-Type: text/plain");
    echo "{$z88SMS}";
} catch (\Exception $e) {
    echo $e->getMessage();
}
