<?php

namespace NFePHP\Sintegra\Tests;

use NFePHP\Sintegra\Elements\Z54;
use PHPUnit\Framework\TestCase;
use stdClass;

class Z54Test extends TestCase
{
    public function testZ54()
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
        $std->CST = '106';
        $std->NUMERO_ITEM = '6102';
        $std->CODIGO_PRODUTO = '6102';
        $std->QUANTIDADE = '6102';
        $std->VL_PRODUTO = '30000';
        $std->VL_DESCONTO = '30000';
        $std->VL_BC_ICMS = '2400';
        $std->VL_BC_ICMS_ST = '0';
        $std->VL_IPI = '0';
        $std->ALIQUOTA = '08';
        $b1 = new Z54($std);
        $resp = "{$b1}";

        $expected = '5400000961293950550996120395102000001065565        000000010000000000100000000000000000000000100000000000000000000000000000700';
        $this->assertEquals($expected, $resp);
    }
}
