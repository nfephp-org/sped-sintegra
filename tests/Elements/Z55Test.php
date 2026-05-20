<?php

namespace NFePHP\Sintegra\Tests\Elements;

use NFePHP\Sintegra\Elements\Z55;
use PHPUnit\Framework\TestCase;

class Z55Test extends TestCase
{
    public function testBuildWithAlphanumericCnpj(): void
    {
        $std = new \stdClass();
        $std->CNPJ = 'NLG6401C000144';
        $std->IE = '283305054';
        $std->GNRE_DATA = '20050502';
        $std->UF_SUBSTITUTO = 'PR';
        $std->UF_FAVORECIDA = 'PR';
        $std->GNRE_BANCO = '136';
        $std->GNRE_AGENCIA = '1045';
        $std->GNRE_NUMERO = '3213131';
        $std->VL_TOTAL = '10';
        $std->DATA_VENCIMENTO = '20050502';
        $std->MES_ANO = '052021';
        $std->CONVENIO = '200505';

        $elem = new Z55($std);
        $got = "{$elem}";
        $expected = '55NLG6401C000144283305054     20050502PRPR13610453213131             000000000100020050502052021200505                        ';

        $this->assertEquals($expected, $got);
        $this->assertEquals($elem->errors, []);
    }
}
