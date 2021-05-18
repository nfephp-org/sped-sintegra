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
        //$std->FAX = '4934420101';
        $std->DT_INI = '20200101';
        $std->DT_FIM = '20200131';
        $std->COGIGO_MAGNETICO = 2;
        $std->COGIGO_NATUREZAS = 3;
        $std->COGIGO_FINALIDADE = 1;
        $b1 = new Z10($std);
        $resp = "{$b1}";

        $expected = '106629156100010300000283305054EMPRESA TESTE LTDA                 '
            .'CONCORDIA                     SC49344201012020010120200131231';
        $this->assertEquals($expected, $resp);
    }
}
