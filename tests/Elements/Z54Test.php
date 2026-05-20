<?php

namespace NFePHP\Sintegra\Tests\Elements;

use NFePHP\Sintegra\Elements\Z54;
use PHPUnit\Framework\TestCase;

class Z54Test extends TestCase
{
    public function testBuildWithAlphanumericCnpj(): void
    {
        $std = new \stdClass();
        $std->CNPJ = 'NLG6401C000144';
        $std->COD_MOD = '55';
        $std->SERIE = '099';
        $std->NUM_DOC = '612047';
        $std->CFOP = '6102';
        $std->CST = '010';
        $std->NUMERO_ITEM = 1;
        $std->CODIGO_PRODUTO = '12345';
        $std->QUANTIDADE = 1.000;
        $std->VL_PRODUTO = 100.00;
        $std->DESCONTO = 0.00;
        $std->VL_BC_ICMS = 100.00;
        $std->VL_BC_ICMS_ST = 0.00;
        $std->VL_IPI = 10.00;
        $std->ALIQUOTA = 10.00;

        $elem = new Z54($std);
        $got = "{$elem}";
        $expected = '54NLG6401C00014455099612047610201000112345         000000010000000000100000000000000000000000100000000000000000000000010001000';

        $this->assertEquals($expected, $got);
        $this->assertEquals($elem->errors, []);
    }
}
