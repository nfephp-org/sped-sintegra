<?php

namespace NFePHP\Sintegra\Tests;

use NFePHP\Sintegra\Elements\Z53;
use PHPUnit\Framework\TestCase;
use stdClass;

class Z53Test extends TestCase
{
    public function testZ53()
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
        $std->VL_BC_ICMS_ST = '30000';
        $std->VL_ICMS_RET = '30000';
        $std->DESPESAS = '0';
        $std->SITUACAO = 'N';
        $std->CODIGO_ANTECIPACAO = '0';
        $std->BRANCOS = '0';
        $b1 = new Z53($std);
        $resp = "{$b1}";

        $expected = '5066291561000103283305054     20052020SC550996120476102P000000003000000000000300000000000002400000000000000000000000000000800N';
        $this->assertEquals($expected, $resp);
    }
}
