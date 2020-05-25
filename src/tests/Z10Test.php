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
        $std->CNPJ = '00445335000113';
        $std->IE = '283305053';
        $std->NOME_CONTRIBUINTE = 'MOBILIARTE MADEIRA E ARTEFATOS EIRE';
        $std->MUNICIPIO = 'Ponta Pora';
        $std->UF = 'SC';
        // $std->FAX = '';
        // $std->DT_INI = '';
        // $std->DT_FIM = '';
        // $std->COGIGO_MAGNETICO = '';
        // $std->COGIGO_NATUREZAS = '';
        // $std->COGIGO_FINALIDADE = '';
        $b1 = new Z10($std);
        $resp = "{$b1}";

        $expected = '|10|00445335000113|283305053|MOBILIARTE MADEIRA E ARTEFATOS EIRE|Ponta Pora|SC|||||||';
        $this->assertEquals($expected, $resp);
    }
}