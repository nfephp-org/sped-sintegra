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
    $std->MUNICIPIO = 'BREJO SECO'; //Obrig Municipio do estabelicimento
    $std->UF = 'MA'; //Obrig Sigla da Unidade da Federação da pessoa
    $std->FAX = null; //opcional Telefone do estabelicimento
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
    $std->BAIRRO = null; //opcional Bairro do estabelicimento
    $std->CEP = '12345678'; //Obrig CEP do endereço
    $std->CONTATO = 'FULANO DE TAL'; //Obrig Nome da pessoa responsavel pelo estabelcimento
    $std->TELEFONE = '5555555'; //Obrig Telefone do estabelicimento
    $b1->z11($std);

    $sintegra = new Sintegra();
    $sintegra->add($b1);

    $txt = $sintegra->get();
    
    header("Content-Type: text/plain");
    echo $txt;
    
} catch (\Exception $e) {
    echo $e->getMessage();
}