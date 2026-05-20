<?php

namespace NFePHP\Sintegra\Tests\Elements;

use NFePHP\Sintegra\Elements\Z70;
use PHPUnit\Framework\TestCase;

class Z70Test extends TestCase
{
    public function testBuildWithAlphanumericCnpj(): void
    {
        $std = new \stdClass();
        $std->CNPJ = 'NLG6401C000144';
        $std->IE = '283305054';
        $std->DATA_EMISSAO = '20050502';
        $std->UF = 'PR';
        $std->COD_MOD = '01';
        $std->SERIE = '1';
        $std->SUB_SERIE = null;
        $std->NUM_DOC = '1';
        $std->CFOP = '5102';
        $std->VL_TOTAL = 100;
        $std->VL_BC_ICMS = 100;
        $std->VL_ICMS = 0;
        $std->ISENTA_NTRIBUTADA = 0;
        $std->OUTRAS = 0;
        $std->MOD_FRETE = '2';
        $std->SITUACAO = 'S';

        $elem = new Z70($std);
        $got = "{$elem}";
        $expected = '70NLG6401C000144283305054     20050502PR011  00000151020000000010000000000000100000000000000000000000000000000000000000000002S';

        $this->assertEquals($expected, $got);
        $this->assertEquals($elem->errors, []);
    }
}
