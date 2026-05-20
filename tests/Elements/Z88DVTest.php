<?php

namespace NFePHP\Sintegra\Tests\Elements;

use NFePHP\Sintegra\Elements\Z88DV;
use PHPUnit\Framework\TestCase;

class Z88DVTest extends TestCase
{
    public function testBuildWithAlphanumericCnpj(): void
    {
        $std = new \stdClass();
        $std->DATA_EMISSAO = '20201212';
        $std->SERIE = '1';
        $std->NUM_DOC = '111';
        $std->NUM_COO = '12345';
        $std->DATA_EMISSAO_CUPOM = '20201212';
        $std->NUMERO_ITEM = '1';
        $std->CODIGO_PRODUTO = '123456';
        $std->QUANTIDADE = '10';
        $std->RELATORIO_NUM_COO = '1';
        $std->RELATORIO_DATA_EMISSAO = '20201212';
        $std->NUM_FAB = '12345';
        $std->CNPJ = 'AB12CD34000190';
        $std->VL_UNITARIO = '100';
        $std->VL_BC_ICMS = '100';
        $std->VL_ICMS = '18';

        $elem = new Z88DV($std);
        $got = "{$elem}";
        $expected = '88DV202012121  00011101234520201212001123456        00000000100000000012020121212345               AB12CD34000190000000010000000000010000000000001800';

        $this->assertEquals($expected, $got);
        $this->assertEquals($elem->errors, []);
    }
}
