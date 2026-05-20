<?php

namespace NFePHP\Sintegra\Tests\Elements;

use NFePHP\Sintegra\Elements\Z74;
use PHPUnit\Framework\TestCase;

class Z74Test extends TestCase
{
    public function testBuildWithAlphanumericCnpj(): void
    {
        $std = new \stdClass();
        $std->DATA_INVENTARIO = '20050502';
        $std->CODIGO_PRODUTO = '1';
        $std->QUANTIDADE = '1';
        $std->VL_PRODUTO = '100';
        $std->CODIGO_POSSE = '1';
        $std->CNPJ = 'NLG6401C000144';
        $std->IE = null;
        $std->UF = 'PR';

        $elem = new Z74($std);
        $got = "{$elem}";
        $expected = '74200505021             000000000100000000000100001NLG6401C000144              PR                                             ';

        $this->assertEquals($expected, $got);
        $this->assertEquals($elem->errors, []);
    }
}
