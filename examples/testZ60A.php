<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z60A;

$std = new stdClass();
$std->DATA_EMISSAO = '20050502';
$std->NUM_FAB = '4224';
$std->ALIQUOTA = '10';
$std->VL_TOTAL = '1000';
$std->BRANCOS = null;

try {
    $z60A = new Z60A($std);

    header("Content-Type: text/plain");
    echo "{$z60A}";
} catch (\Exception $e) {
    echo $e->getMessage();
}
