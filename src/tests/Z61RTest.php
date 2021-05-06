<?php

namespace NFePHP\Sintegra\Tests;

use NFePHP\Sintegra\Elements\Z61R;
use PHPUnit\Framework\TestCase;
use stdClass;

class Z61RTest extends TestCase
{
    public function testZ61()
    {
        $std = new stdClass();
        $std->PERIODO_EMISSAO = '022021';
        $std->COD_PRODUTO = '000004';
        $std->QUANTIDADE = '1000';
        $std->VALOR_PRODUTO = '9000';
        $std->BASE_ICMS = '0';
        $std->ALIQUOTA = '0';
        $b1 = new Z61R($std);
        $resp = "{$b1}";

        $expected = '61R022021000004        0000000001000000000000000900000000000000000000000                                                      ';
        $this->assertEquals($expected, $resp);
    }
}
