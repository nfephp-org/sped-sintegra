<?php

namespace NFePHP\Sintegra\Tests\Elements;

use NFePHP\Sintegra\Elements\Z56;
use PHPUnit\Framework\TestCase;

class Z56Test extends TestCase
{
    public function testBuildWithAlphanumericCnpj(): void
    {
        $std = new \stdClass();
        $std->CNPJ = 'NLG6401C000144';
        $std->COD_MOD = '01';
        $std->SERIE = '099';
        $std->NUM_DOC = '23';
        $std->CFOP = '5102';
        $std->CST = '101';
        $std->NUMERO_ITEM = '1';
        $std->CODIGO_PRODUTO = '136';
        $std->TIPO_OPERACAO = '2';
        $std->CNPJ_CONCESSIONARIA = 'NLG6401C000144';
        $std->ALIQUOTA_IPI = '10';
        $std->CHASSI = '20050502200505021';

        $elem = new Z56($std);
        $got = "{$elem}";
        $expected = '56NLG6401C000144010990000235102101001136           2NLG6401C000144100020050502200505021                                       ';

        $this->assertEquals($expected, $got);
        $this->assertEquals($elem->errors, []);
    }
}
