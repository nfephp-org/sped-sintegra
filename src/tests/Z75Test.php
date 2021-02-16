<?php

namespace NFePHP\Sintegra\Tests;

use NFePHP\Sintegra\Elements\Z75;
use PHPUnit\Framework\TestCase;
use stdClass;

class Z75Test extends TestCase
{
    public function testZ75()
    {
        $std = new stdClass();
        $std->DT_INI = '01022020';
        $std->DT_FIM = '01022020';
        $std->CODIGO_PRODUTO = '1';
        $std->CODIGO_NCM = '19059090';
        $std->DESCRICAO = 'Bala Fini Morango (Tributado)';
        $std->UN = 'UN';
        $std->ALIQUOTA_IPI = '0';
        $std->ALIQUOTA_ICMS = '07';
        $std->REDUCAO_BASE_ICMS = '0';
        $std->BASE_ICMS = '0';
        $b1 = new Z75($std);
        $resp = "{$b1}";

        $expected = '7501022020010220201             19059090Bala Fini Morango (Tributado)                        UN    000000700000000000000000000';
        $this->assertEquals($expected, $resp);
    }
}
