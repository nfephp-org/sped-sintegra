<?php

namespace NFePHP\Sintegra\Tests\Elements;

use NFePHP\Sintegra\Elements\Z76;
use PHPUnit\Framework\TestCase;

class Z76Test extends TestCase
{
    public function testBuildWithAlphanumericCnpj(): void
    {
        $std = new \stdClass();
        $std->CNPJ = 'NLG6401C000144';
        $std->IE = '283305054';
        $std->COD_MOD = '01';
        $std->SERIE = '1';
        $std->SUB_SERIE = null;
        $std->NUM_DOC = '1';
        $std->CFOP = '5102';
        $std->TIPO_RECEITA = '2';
        $std->DATA_EMISSAO = '20050502';
        $std->UF = 'PR';
        $std->VL_TOTAL = '100';
        $std->VL_BC_ICMS = '100';
        $std->VL_ICMS = '10';
        $std->ISENTA_NTRIBUTADA = '0';
        $std->OUTRAS = '0';
        $std->ALIQUOTA = '0';
        $std->SITUACAO = 'S';

        $elem = new Z76($std);
        $got = "{$elem}";
        $expected = '76NLG6401C000144283305054     011   00000000015102220050502PR0000000010000000000001000000000000100000000000000000000000000000S';

        $this->assertEquals($expected, $got);
        $this->assertEquals($elem->errors, []);
    }
}
