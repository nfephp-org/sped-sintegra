<?php

namespace NFePHP\Sintegra\Tests;

use NFePHP\Sintegra\Elements\Z51;
use PHPUnit\Framework\TestCase;
use stdClass;

class Z51Test extends TestCase
{
    public function testZ51()
    {
        $std = new stdClass();
        $std->CNPJ = '66291561000103';
        $std->IE = '283305054';
        $std->DATA_EMISSAO = '20052020';
        $std->UF = 'SC';
        $std->SERIE = '099';
        $std->NUM_DOC = '612047';
        $std->CFOP = '6102';
        $std->VL_TOTAL = '30000';
        $std->VL_TOTAL_IPI = '30000';
        $std->ISENTA_NTRIBUTADA = '0';
        $std->OUTRAS = '0';
        $std->BRANCOS = '0';
        $std->SITUACAO = 'N';
        $b1 = new Z51($std);
        $resp = "{$b1}";

        $expected = '5166291561000103283305054     20052020SC0996120476102000000003000000000000300000000000000000000000000000000000000000000800N';
        $this->assertEquals($expected, $resp);
    }
}
