<?php

namespace NFePHP\Sintegra\Tests;

use NFePHP\Sintegra\Elements\Z61;
use PHPUnit\Framework\TestCase;
use stdClass;

class Z61Test extends TestCase
{
    public function testZ61()
    {
        $std = new stdClass();
        $std->DATA_EMISSAO = '01022020';
        $std->COD_MOD = '65';
        $std->SERIE = 'D';
        $std->NUM_INICIAL = '004567';
        $std->NUM_FINAL = '004567';
        $std->VL_TOTAL = '19000';
        $std->VL_BC_ICMS = '19000';
        $std->VL_ICMS = '1330';
        $std->ISENTO_NTRIBUTADO = '0';
        $std->OUTRAS_DESPESAS = '0';
        $std->ALIQUOTA = '07';
        $b1 = new Z61($std);
        $resp = "{$b1}";

        $expected = '61                            0102202065D    00456700456700000000190000000000019000000000001330000000000000000000000000000700 ';
        $this->assertEquals($expected, $resp);
    }
}
