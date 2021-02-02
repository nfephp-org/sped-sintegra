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
        $std->CNPJ = '6660598960';
        $std->COD_MOD = '55';
        $std->SERIE = '099';
        $std->NUM_DOC = '5896';
        $std->CFOP = '6102';
        $std->CST = '000';
        $std->NUMERO_ITEM = '1';
        $std->CODIGO_PRODUTO = '1';
        $std->QUANTIDADE = '1000';
        $std->VL_PRODUTO = '10000';
        $std->OUTRAS_DESPESAS = '0';
        $std->VL_BC_ICMS = '10000';
        $std->VL_BC_ICMS_ST = '0';
        $std->VL_IPI = '0';
        $std->ALIQUOTA = '07';
        $b1 = new Z54($std);
        $resp = "{$b1}";

        $expected = '54000066605989605509900589661020000011             000000010000000000100000000000000000000000100000000000000000000000000000700';
        $this->assertEquals($expected, $resp);
    }
}
