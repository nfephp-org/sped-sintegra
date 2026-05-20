<?php

namespace NFePHP\Sintegra\Tests\Elements;

use NFePHP\Sintegra\Elements\Z57;
use PHPUnit\Framework\TestCase;

class Z57Test extends TestCase
{
    public function testBuildWithAlphanumericCnpj(): void
    {
        $std = new \stdClass();
        $std->CNPJ = 'NLG6401C000144';
        $std->IE = '283305054';
        $std->COD_MOD = '01';
        $std->SERIE = '099';
        $std->NUM_DOC = '23';
        $std->CFOP = '5102';
        $std->CST = '101';
        $std->NUMERO_ITEM = '1';
        $std->CODIGO_PRODUTO = '136';
        $std->NUM_LOTE = '20050502200505021';

        $elem = new Z57($std);
        $got = "{$elem}";
        $expected = '57NLG6401C000144283305054     010990000235102101001136           20050502200505021                                            ';

        $this->assertEquals($expected, $got);
        $this->assertEquals($elem->errors, []);
    }
}
