<?php

namespace NFePHP\Sintegra\Tests\Elements;

use NFePHP\Sintegra\Elements\Z50;
use PHPUnit\Framework\TestCase;

class Z50Test extends TestCase
{
    public function testBuildWithAlphanumericCnpj(): void
    {
        $std = new \stdClass();
        $std->CNPJ = 'NLG6401C000144';
        $std->IE = '283305054';
        $std->DATA_EMISSAO = '20050502';
        $std->UF = 'SC';
        $std->COD_MOD = '55';
        $std->SERIE = '9';
        $std->NUM_DOC = '612047';
        $std->CFOP = '6102';
        $std->EMITENTE = 'P';
        $std->VL_TOTAL = 300.2223;
        $std->VL_BC_ICMS = 300.594;
        $std->VL_ICMS = 24.393939;
        $std->ISENTA_NTRIBUTADA = 0;
        $std->OUTRAS = 0;
        $std->ALIQUOTA = 18;
        $std->SITUACAO = 'N';

        $elem = new Z50($std);
        $got = "{$elem}";
        $expected = '50NLG6401C000144283305054     20050502SC559  6120476102P000000003002200000000300590000000002439000000000000000000000000001800N';

        $this->assertEquals($expected, $got);
        $this->assertEquals($elem->errors, []);
    }
}
