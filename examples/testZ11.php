<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

$std = new \stdClass();
$std->LOGRADOURO = 'RUA DO OUVIDOR'; //Obrig Endereço do estabelcimento,
$std->NUMERO = '100'; //Obrig Número do endereço
$std->COMPLEMENTO = null; //opcional Complemento do endereço
$std->BAIRRO = ''; //opcional Bairro do estabelecimento
$std->CEP = '12345678'; //Obrig CEP do endereço
$std->CONTATO = 'FULANO DE TAL'; //Obrig Nome da pessoa responsavel pelo estabelcimento
$std->TELEFONE = '5555555'; //Obrig Telefone do estabelecimento

try {
    $elem = new NFePHP\Sintegra\Elements\Z11($std);
    $txt = "{$elem}";

    header("Content-Type: text/plain");
    echo $txt;
    
    echo "\n";
    echo "\n";
    print_r($elem->errors);
    
    
} catch (\Exception $e) {
    echo $e->getMessage();
}
