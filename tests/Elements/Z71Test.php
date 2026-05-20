<?php

namespace NFePHP\Sintegra\Tests\Elements;

use NFePHP\Sintegra\Elements\Z71;
use PHPUnit\Framework\TestCase;

class Z71Test extends TestCase
{
    public function testBuildWithAlphanumericCnpj(): void
    {
        $std = new \stdClass();
        $std->CNPJ_TOM = 'NLG6401C000144';
        $std->IE_TOM = '283305054';
        $std->DATA_EMISSAO = '20050502';
        $std->UF_TOM = 'PR';
        $std->COD_MOD = '01';
        $std->SERIE = '1';
        $std->SUB_SERIE = null;
        $std->NUM_DOC = '1';
        $std->UF_REM_DEST = 'PR';
        $std->CNPJ_REM_DEST = 'NLG6401C000144';
        $std->IE_REM_DEST = '283305054';
        $std->DATA_EMISSAO_NF = '20050502';
        $std->COD_MOD_NF = '55';
        $std->SERIE_NF = '1';
        $std->NUM_DOC_NF = '1000';
        $std->VL_TOTAL = '100';

        $elem = new Z71($std);
        $got = "{$elem}";
        $expected = '71NLG6401C000144283305054     20050502PR011  000001PRNLG6401C0001440000028330505420050502551  00100000000000010000            ';

        $this->assertEquals($expected, $got);
        $this->assertEquals($elem->errors, []);
    }
}
