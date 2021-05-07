<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z51;

$std = new stdClass();
$std->CNPJ = '66291561000103'; //Obrig CNPJ/CPF do remetente nas entradas e dos destinátarios nas saídas
$std->IE = '283305054'; //opcional IE do remetente ou isento ou null
$std->DATA_EMISSAO = '20050502'; //Obrig data de emissão
$std->UF = 'SC'; //Obrig Sigla da Unidade da Federação do remetente
$std->SERIE = '099'; //Obrig Série do documento fiscal
$std->NUM_DOC = '612047';//Obrig passar somente os ultimos 6 digitos (se houver mais de 6)
$std->CFOP = '6102'; //Obrig Código Fiscal de Operação e Prestação
$std->EMITENTE = 'P';//Obrig P-Proprio T-terceiros
$std->VL_TOTAL = 300.00; //Obrig Valor total da nota fiscal (com 2 decimais)
$std->VL_TOTAL_IPI = 30.00; //Obrig Base de Cálculo do ICMS (com 2 decimais)
$std->ISENTA_NTRIBUTADA = 0;//Obrig Valor amparado por isenção ou não incidência (com 2 decimais)
$std->OUTRAS = 0;//Obrig Valor que não confira débito ou crédito do ICMS (com 2 decimais)
$std->SITUACAO = 'N';//Obrig S-cancelado ou N-normal Situação da Nota fiscal

try {
    $z51 = new Z51($std);

    header("Content-Type: text/plain");
    echo "{$z51}";

} catch (\Exception $e) {
    echo $e->getMessage();
}
