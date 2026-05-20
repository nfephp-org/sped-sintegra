<?php

namespace NFePHP\Sintegra\Tests\Elements;

use NFePHP\Sintegra\Elements\Z53;
use PHPUnit\Framework\TestCase;

class Z53Test extends TestCase
{
    public function testBuildWithAlphanumericCnpj(): void
    {
        $std = new \stdClass();
        $std->CNPJ = 'NLG6401C000144';
        $std->IE = '283305054';
        $std->DATA_EMISSAO = '20050502';
        $std->UF = 'SC';
        $std->COD_MOD = '55';
        $std->SERIE = '099';
        $std->NUM_DOC = '612047';
        $std->CFOP = '6102';
        $std->EMITENTE = 'P';
        $std->VL_BC_ICMS_ST = 300.00;
        $std->VL_ICMS_RET = 30.00;
        $std->DESPESAS = 0;
        $std->SITUACAO = 'N';
        $std->CODIGO_ANTECIPACAO = '1';

        $elem = new Z53($std);
        $got = "{$elem}";
        $expected = '53NLG6401C000144283305054     20050502SC550996120476102P000000003000000000000030000000000000000N1                             ';

        $this->assertEquals($expected, $got);
        $this->assertEquals($elem->errors, []);
    }
}
