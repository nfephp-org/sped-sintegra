<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\Sintegra\Blocks\Block1;

try {
    $b1 = new Block1();

    $std = new \stdClass();
    $std->cNPJ = '77774523000110';
    $std->IE = null;
    $std->NOME_CONTRIBUINTE = 'FULANO DE TAL LTDA';
    $std->MUNICIPIO = 'BREJO SECO';
    $std->UF = 'MA';
    $std->FAX = null;
    $std->DT_INI = '20210101';
    $std->DT_FIM = '20210131';
    $std->COGIGO_MAGNETICO = '1';
    $std->COGIGO_NATUREZAS = '3';
    $std->COGIGO_FINALIDADE = '1';
    $b1->z10($std);

    $std = new \stdClass();
    $std->LOGRADOURO = 'RUA DO OUVIDOR';
    $std->NUMERO = '100';
    $std->COMPLEMENTO = null;
    $std->BAIRRO = '';
    $std->CEP = '12345678';
    $std->CONTATO = 'FULANO DE TAL';
    $std->TELEFONE = '5555555';
    $b1->z11($std);

    $txt = $b1->get();

    header("Content-Type: text/plain");
    echo $txt;

    //caso existam erros eles estarão na propriedade ARRAY publica errors
    if (!empty($elem->errors)) {
        echo "\n";
        echo "\n";
        print_r($b1->errors);
    }
} catch (\Exception $e) {
    echo $e->getMessage();
}
