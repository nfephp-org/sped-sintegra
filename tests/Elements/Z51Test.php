<?php

namespace NFePHP\Sintegra\Tests\Elements;

use NFePHP\Sintegra\Elements\Z51;
use PHPUnit\Framework\TestCase;

class Z51Test extends TestCase
{
    public function testBuildWithAlphanumericCnpj(): void
    {
        $std = new \stdClass();
        $std->CNPJ = 'NLG6401C000144';
        $std->IE = '283305054';
        $std->DATA_EMISSAO = '20050502';
        $std->UF = 'SC';
        $std->SERIE = '099';
        $std->NUM_DOC = '612047';
        $std->CFOP = '6102';
        $std->VL_TOTAL = 300.00;
        $std->VL_TOTAL_IPI = 30.00;
        $std->ISENTA_NTRIBUTADA = 0;
        $std->OUTRAS = 0;
        $std->SITUACAO = 'N';

        $elem = new Z51($std);
        $got = "{$elem}";
        $expected = '51NLG6401C000144283305054     20050502SC09961204761020000000030000000000000300000000000000000000000000000                    N';

        $this->assertEquals($expected, $got);
        $this->assertEquals($elem->errors, []);
    }
}
