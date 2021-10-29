<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Elements\Z53;

$std = new stdClass();
$std->CNPJ = '99999090910270'; //Obrig CNPJ/CPF do remetente nas entradas e dos destinátarios nas saídas
$std->IE = '283305054'; //opcional IE do remetente ou isento ou null
$std->DATA_EMISSAO = '20050502'; //Obrig data de emissão
$std->UF = 'SC'; //Obrig Sigla da Unidade da Federação do remetente
$std->COD_MOD = '55'; //Obrig Código do modelo da nota fiscal
//24 - Autorização de Carregamento e Transporte, modelo 24
//14 - Bilhete de Passagem Aquaviário, modelo 14
//15 - Bilhete de Passagem e Nota de Bagagem, modelo 15
//16 - Bilhete de Passagem Ferroviário, modelo 16
//13 - Bilhete de Passagem Rodoviário, modelo 13
//10 - Conhecimento Aéreo, modelo 10
//11 - Conhecimento de Transporte Ferroviário de Cargas, modelo 11
//09 - Conhecimento de Transporte Aquaviário de Cargas, modelo 9
//08 - Conhecimento de Transporte Rodoviário de Cargas, modelo 8
//17 - Despacho de Transporte, modelo 17
//25 - Manifesto de Carga, modelo 25
//01 - Nota Fiscal, modelo 1
//06 - Nota Fiscal/Conta de Energia Elétrica, modelo 6
//03 - Nota Fiscal de Entrada, modelo 3
//21 - Nota Fiscal de Serviço de Comunicação, modelo 21
//04 - Nota Fiscal de Produtor, modelo 4
//22 - Nota Fiscal de Serviço de Telecomunicações, modelo 22
//07 - Nota Fiscal de Serviço de Transporte, modelo 7
//02 - Nota Fiscal de Venda a Consumidor, modelo 02
//20 - Ordem de Coleta de Carga, modelo 20
//18 - Resumo Movimento Diário, modelo 18
//26 - Conhecimento de Transporte Multimodal de Cargas, modelo 26
//55 - Nota Fiscal Eletrônica, modelo 55
//27 - Nota Fiscal de Serviço de Transporte Ferroviário, modelo 27
//57 - Conhecimento de Transporte Eletrônico, modelo 57
//60 - Cupom Fiscal Eletrônico, CF-e- ECF, modelo 60
//63 - Bilhete de Passagem Eletrônico, modelo 63
//65 - Nota Fiscal de Consumidor Eletrônica, modelo 65
//67 - Conhecimento de Transporte Eletrônico para Outros Serviços, modelo 67
$std->SERIE = '099'; //Obrig Série do documento fiscal
$std->NUM_DOC = '612047';//Obrig passar somente os ultimos 6 digitos (se houver mais de 6)
$std->CFOP = '6102'; //Obrig Código Fiscal de Operação e Prestação
$std->EMITENTE = 'P';//Obrig P-Proprio T-terceiros
$std->VL_BC_ICMS_ST = 300.00; //Obrig Base de cálculo de retenção do ICMS (com 2 decimais)
$std->VL_ICMS_RET = 30.00; //Obrig ICMS retido pelo substituto (com 2 decimais)
$std->DESPESAS = 0; //Obrig Soma das despesas acessórias (frete, seguro e outras - com 2 decimais)
$std->SITUACAO = 'N';//Obrig Situação da Nota fiscal S-cancelada N-normal
$std->CODIGO_ANTECIPACAO = '1'; //Obrig Código que identifica o tipo da Antecipação Tributária
//1 - Pagamento de substituição efetuada pelo destinatário, quando não efetuada ou efetuada a menor pelo substituto
//2 - Antecipação tributária efetuada pelo destinatário apenas com complementação do diferencial de aliquota
//3 - Antecipação tributária com MVA (Margem de Valor Agregado), efetuada pelo destinatário sem encerrar a fase de tributação
//4- Antecipação tributária com MVA (Margem de Valor Agregado), efetuada pelo destinatário encerrando a fase de tributação
//5 - Substituição tributária interna motivada por regime especial de tributação
//6 - ICMS pago na importação
//' ' - Substituição Tributária informada pelo substituto ou pelo substituído que não incorra em nenhuma das situações anteriores



try {
    
    $elem = new Z53($std);

    header("Content-Type: text/plain");
    echo "{$elem}";
    
    echo "\n";
    echo "\n";
    print_r($elem->errors);

} catch (\Exception $e) {
    echo $e->getMessage();
}
