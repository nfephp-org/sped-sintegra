<?php

namespace NFePHP\Sintegra\Tests;

use NFePHP\Sintegra\Elements\Z50;
use PHPUnit\Framework\TestCase;
use stdClass;

class Z50Test extends TestCase
{
    public function testZ50()
    {
        $std = new stdClass();
        $std->CNPJ = '66291561000103';
        $std->IE = '283305054';
        $std->DATA_EMISSAO = '20052020';
        $std->UF = 'SC';
        $std->COD_MOD = '55';
        $std->SERIE = '099';
        $std->NUM_DOC = '612047';
        $std->CFOP = '6102';
        $std->EMITENTE = 'P';
        $std->VL_TOTAL = '30000';
        $std->VL_BC_ICMS = '30000';
        $std->VL_ICMS = '2400';
        $std->ISENTA_NTRIBUTADA = '0';
        $std->OUTRAS = '0';
        $std->ALIQUOTA = '08';
        $std->SITUACAO = 'N';
        $b1 = new Z50($std);
        $resp = "{$b1}";

        $expected = '5066291561000103283305054     20052020SC550996120476102P000000003000000000000300000000000002400000000000000000000000000000800N';
        $this->assertEquals($expected, $resp);
    }
}
