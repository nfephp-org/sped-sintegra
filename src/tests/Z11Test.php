<?php

namespace NFePHP\Sintegra\Tests;

use NFePHP\Sintegra\Elements\Z11;
use PHPUnit\Framework\TestCase;
use stdClass;

class Z11Test extends TestCase
{
    public function testZ11()
    {
        $std = new stdClass();
        $std->LOGRADOURO = 'AV CAP. MOR GOUVEIA';
        $std->NUMERO = '03005';
        $std->COMPLEMENTO = 'LAGOA NOVA';
        $std->BAIRRO = 'CENTRO';
        $std->CEP = '79900001';
        $std->CONTATO = 'MOBILIARTE MADEIRA';
        $std->TELEFONE = '490034420122';
        $b1 = new Z11($std);
        $resp = "{$b1}";

        $expected = '11AV CAP. MOR GOUVEIA               03005LAGOA NOVA            '
            .'CENTRO         79900001MOBILIARTE MADEIRA          490034420122';
        $this->assertEquals($expected, $resp);
    }
}
