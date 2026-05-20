<?php

namespace NFePHP\Sintegra\Tests\Elements;

use NFePHP\Sintegra\Elements\Z77;
use PHPUnit\Framework\TestCase;

class Z77Test extends TestCase
{
    public function testBuildWithAlphanumericCnpj(): void
    {
        $std = new \stdClass();
        $std->CNPJ = 'NLG6401C000144';
        $std->COD_MOD = '01';
        $std->SERIE = '1';
        $std->SUB_SERIE = null;
        $std->NUM_DOC = '1';
        $std->CFOP = '5102';
        $std->TIPO_RECEITA = '2';
        $std->NUMERO_ITEM = '1';
        $std->CODIGO_SERVICO = '12345678901';
        $std->QUANTIDADE = 1;
        $std->VL_SERVICO = 100;
        $std->OUTRAS_DESPESAS = 0;
        $std->VL_BC_ICMS = 100;
        $std->ALIQUOTA = 18;
        $std->CNPJ_MF = 'NLG6401C000144';
        $std->TERMINAL = null;

        $elem = new Z77($std);
        $got = "{$elem}";
        $expected = '77NLG6401C000144011   00000000015102200112345678901000000000100000000000010000000000000000000001000018NLG6401C0001440000000000';

        $this->assertEquals($expected, $got);
        $this->assertEquals($elem->errors, []);
    }
}
