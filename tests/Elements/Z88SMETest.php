<?php

namespace NFePHP\Sintegra\Tests\Elements;

use NFePHP\Sintegra\Elements\Z88SME;
use PHPUnit\Framework\TestCase;

class Z88SMETest extends TestCase
{
    public function testBuildWithAlphanumericCnpj(): void
    {
        $std = new \stdClass();
        $std->CNPJ = 'NLG6401C000144';
        $std->MENSAGEM = 'Sem Movimento de Entradas';

        $elem = new Z88SME($std);
        $got = "{$elem}";
        $expected = '88SMENLG6401C000144SEM MOVIMENTO DE ENTRADAS                                                                                  ';

        $this->assertEquals($expected, $got);
        $this->assertEquals($elem->errors, []);
    }
}
