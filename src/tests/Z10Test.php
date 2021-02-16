<?php

namespace NFePHP\Sintegra\Tests;

use NFePHP\Sintegra\Elements\Z10;
use PHPUnit\Framework\TestCase;
use stdClass;

class Z10Test extends TestCase
{
    public function testZ10()
    {
        $std = new stdClass();
        $std->CNPJ = '66291561000103';
        $std->IE = '283305054';
        $std->NOME_CONTRIBUINTE = 'Empresa Teste Ltda';
        $std->MUNICIPIO = 'Concordia';
        $std->UF = 'SC';
        $std->FAX = '4934420101';
        $std->DT_INI = '01012020';
        $std->DT_FIM = '03012020';
        $std->COGIGO_MAGNETICO = 3;
        $std->COGIGO_NATUREZAS = 3;
        $std->COGIGO_FINALIDADE = 1;
        $b1 = new Z10($std);
        $resp = "{$b1}";

        $expected = '1066291561000103283305054     Empresa Teste Ltda                 Concordia'
            . '                     SC49344201010101202003012020331';
        print_r($resp);
        die;
        $this->assertEquals($expected, $resp);
    }
}
