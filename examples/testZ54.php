<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z54;

$std = new stdClass();
$std->CNPJ = '66291561000103'; //Obrig CNPJ/CPF do remetente nas entradas e dos destinátarios nas saídas
$std->COD_MOD = '55'; //Obrig Código do modelo da nota fiscal
$std->SERIE = '099'; //Obrig Série do documento fiscal
$std->NUM_DOC = '612047';//Obrig passar somente os ultimos 6 digitos (se houver mais de 6)
$std->CFOP = '6102'; //Obrig Código Fiscal de Operação e Prestação
$std->CST = '010'; //opcional IE do remetente ou isento ou null
$std->DATA_EMISSAO = '20050502'; //Obrig data de emissão
$std->NUMERO_ITEM = 1; //Obrig Número de ordem do item na nota fiscal
$std->CODIGO_PRODUTO = 'Prod1';//Obrig Código do produto ou serviço do informante
$std->QUANTIDADE = 1.000; //Obrig Quantidade do produto (com 3 decimais)
$std->VL_PRODUTO = 100.00; //Obrig Valor bruto do produto (valor unitário multiplicado por quantidade) - com 2 decimais
$std->DESCONTO = 0.00; ////Obrig Valor do Desconto Concedido no item (com 2 decimais)
$std->VL_BC_ICMS = 100.00; //Obrig Base de cálculo do ICMS (com 2 decimais)
$std->VL_BC_ICMS_ST = 0.00; //Obrig Base de cálculo do ICMS de retenção na Substituição Tributária (com 2 decimais)
$std->VL_IPI = 10.00; //Obrig Valor do IPI (com 2 decimais)
$std->ALIQUOTA = 10.00; //Obrig Alíquota Utilizada no Cálculo do ICMS (com 2 decimais)

try {
    $z54 = new Z54($std);

    header("Content-Type: text/plain");
    echo "{$z54}";

} catch (\Exception $e) {
    echo $e->getMessage();
}
