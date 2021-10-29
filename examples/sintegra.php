<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Sintegra;

try {

    $b1 = new NFePHP\Sintegra\Blocks\Block1();

    $std = new \stdClass();
    $std->CNPJ = '12345678901234'; //Obrig
    $std->IE = null; //opcional
    $std->NOME_CONTRIBUINTE = 'FULANO DE TAL LTDA'; //Obrig Nome comercial (razao social)
    $std->MUNICIPIO = 'BREJO SECO'; //Obrig Municipio do estabelecimento
    $std->UF = 'MA'; //Obrig Sigla da Unidade da Federação da pessoa
    $std->FAX = null; //opcional Telefone do estabelecimento
    $std->DT_INI = '20210101'; //Obrig Data inicial das informações contidas no arquivo
    $std->DT_FIM = '20210131'; //Obrig Data final das informações contidas no arquivo
    $std->COGIGO_MAGNETICO = '1'; //opcional Código da identificação da estrutura do arquivo magnético entregue
//1 - Estrutura conforme Convênio ICMS 57/95 na versão do Convênio ICMS 31/99
//2 - Estrutura conforme Convênio ICMS 57/95 na versão atual
    $std->COGIGO_NATUREZAS = '3'; //opcional Código da identificação da natureza das operações informadas
//1 - Interestaduais somente operações sujeitas ao regime de substituição tributária
//2 - Interestaduais - operações com ou sem substituição tributária
//3 - Totalidade das operações do informantes
    $std->COGIGO_FINALIDADE = '1'; //opcional Código da finalidade do arquivo magnético
//1 - Normal
//2 - Retificação total de arquivo: substituição total de informações prestadas pelo contribuinte referentes a este período
//3 - Retificação aditiva de arquivo: acréscimo de informação não incluída em arquivos já apresentados
//5 - Desfazimento: arquivo de informação referente a operações/prestações não efetivadas . Neste caso, o arquivo deverá conter, além dos registros tipo 10 e tipo 90, apenas os registros referentes as operações/prestações não efetivadas
    $b1->z10($std);


    $std = new \stdClass();
    $std->LOGRADOURO = 'RUA DO OUVIDOR'; //Obrig Endereço do estabelcimento,
    $std->NUMERO = '100'; //Obrig Número do endereço
    $std->COMPLEMENTO = null; //opcional Complemento do endereço
    $std->BAIRRO = null; //opcional Bairro do estabelecimento
    $std->CEP = '12345678'; //Obrig CEP do endereço
    $std->CONTATO = 'FULANO DE TAL'; //Obrig Nome da pessoa responsavel pelo estabelcimento
    $std->TELEFONE = '5555555'; //Obrig Telefone do estabelecimento
    $b1->z11($std);
    
    $b5 = new NFePHP\Sintegra\Blocks\Block5();

    for($x=0; $x<10; $x++) {    
    $std = new stdClass();
    $std->CNPJ = '66291561000103'; //Obrig CNPJ/CPF do remetente nas entradas e dos destinátarios nas saídas
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
    $std->SERIE = '9'; //Obrig Série do documento fiscal
    $std->NUM_DOC = '612047'; //Obrig passar somente os ultimos 6 digitos (se houver mais de 6)
    $std->CFOP = '6102'; //Obrig Código Fiscal de Operação e Prestação
    $std->EMITENTE = 'P'; //Obrig P-Proprio T-terceiros
    $std->VL_TOTAL = 300.2223; //Obrig Valor total da nota fiscal (com 2 decimais)
    $std->VL_BC_ICMS = 300.594; //Obrig Base de Cálculo do ICMS (com 2 decimais)
    $std->VL_ICMS = 24.393939; //Obrig Montante do imposto (com 2 decimais)
    $std->ISENTA_NTRIBUTADA = 0; //Obrig Valor amparado por isenção ou não incidência (com 2 decimais)
    $std->OUTRAS = 0; //Obrig Valor que não confira débito ou crédito do ICMS (com 2 decimais)
    $std->ALIQUOTA = 18; //Obrig Alíquota do ICMS (com 2 decimais)
    $std->SITUACAO = 'N'; //Obrig S-cancelado ou N-normal Situação da Nota fiscal

    $b5->z50($std);
    }

    $sintegra = new Sintegra();
    $sintegra->add($b1);
    $sintegra->add($b5);

    
    
    $txt = $sintegra->get();

    header("Content-Type: text/plain");
    echo $txt;

    echo "\n";
    echo "\n";

    print_r($sintegra->errors);
} catch (\Exception $e) {
    echo $e->getMessage();
}
