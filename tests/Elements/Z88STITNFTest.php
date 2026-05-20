<?php

namespace NFePHP\Sintegra\Tests\Elements;

use NFePHP\Sintegra\Elements\Z88STITNF;
use PHPUnit\Framework\TestCase;

class Z88STITNFTest extends TestCase
{
    public function testBuildWithAlphanumericCnpj(): void
    {
        $std = new \stdClass();
        $std->CNPJ = 'NLG6401C000144';
        $std->COD_MOD = '55';
        $std->SERIE = '003';
        $std->NUM_DOC = '000001';
        $std->CFOP = '1403';
        $std->CST = '010';
        $std->NUMERO_ITEM = '001';
        $std->DATA_ENTRADA = '20210803';
        $std->CODIGO_PRODUTO = str_pad('00001', 60);
        $std->QUANTIDADE = 1.0;
        $std->VL_PRODUTO = 1.99;
        $std->VL_DESCONTO = 0.0;
        $std->VL_BC_ICMS_OP = 0.17;
        $std->VL_BC_ICMS_ST = 0.0;
        $std->ALIQUOTA_ICMS_ST = 0;
        $std->ALIQUOTA_ICMS_OP = 17;
        $std->VL_IPI = 0.0;
        $std->CHAVE_NFE = '3521' . str_repeat('A', 40);

        $elem = new Z88STITNF($std);
        $got = "{$elem}";
        $expected = '88STITNFNLG6401C0001445500300000000114030100012021080300001                                                       00000001000000000000199000000000000000000000017000000000000000017000000000000003521AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';

        $this->assertEquals($expected, $got);
        $this->assertEquals($elem->errors, []);
    }
}
