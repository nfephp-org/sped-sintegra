<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z55;

$std = new stdClass();
$std->CNPJ = '66291561000103'; //Obrig CNPJ/CPF do remetente nas entradas e dos destinátarios nas saídas
$std->IE = '283305054'; //opcional IE do remetente ou isento ou null
$std->SERIE = '099'; //Obrig Série do documento fiscal
$std->GNRE_DATA = '20050502'; //Obrig data de emissão
$std->UF_SUBSTITUTO = 'PR'; //Obrig data de emissão
$std->UF_FAVORECIDA = 'PR'; //Obrig data de emissão
$std->GNRE_BANCO = '136'; //Obrig data de emissão
$std->GNRE_AGENCIA = '1045'; //Obrig data de emissão
$std->GNRE_NUMERO = '3213131'; //Obrig data de emissão
$std->VL_TOTAL = '10'; //Obrig data de emissão
$std->DATA_VENCIMENTO = '20050502'; //Obrig data de emissão
$std->MES_ANO = '052021'; //Obrig data de emissão
$std->CONVENIO = '200505'; //Obrig data de emissão

try {
    $z54 = new Z55($std);

    header("Content-Type: text/plain");
    echo "{$z54}";

} catch (\Exception $e) {
    echo $e->getMessage();
}
