<?php

namespace NFePHP\Sintegra\Tests\Elements;

use NFePHP\Sintegra\Elements\Z88STES;
use PHPUnit\Framework\TestCase;

class Z88STESTest extends TestCase
{
    public function testBuildWithAlphanumericCnpj(): void
    {
        $std = new \stdClass();
        $std->CNPJ = 'NLG6401C000144';
        $std->DATA_INVENTARIO = '20201231';
        $std->CODIGO_PRODUTO = '123456';
        $std->QUANTIDADE = '10';
        $std->VL_ICMS_ST = '150.26';
        $std->VL_ICMS_OP = '13.45';

        $elem = new Z88STES($std);
        $got = "{$elem}";
        $expected = '88STESNLG6401C00014420201231123456                                                      0000000010000000000015026000000001345 ';

        $this->assertEquals($expected, $got);
        $this->assertEquals($elem->errors, []);
    }
}
