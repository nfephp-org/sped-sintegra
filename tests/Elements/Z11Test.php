<?php

namespace NFePHP\Sintegra\Tests\Elements;

use NFePHP\Sintegra\Elements\Z11;
use PHPUnit\Framework\TestCase;

class Z11Test extends TestCase
{
    public function testZ11Success(): void
    {
        $std = new \stdClass();
        $std->LOGRADOURO = 'RUA DO OUVIDOR';
        $std->NUMERO = '100';
        $std->COMPLEMENTO = null;
        $std->BAIRRO = '';
        $std->CEP = '12345678';
        $std->CONTATO = 'FULANO DE TAL';
        $std->TELEFONE = '5555555';
        $elem = new Z11($std);
        $got = "{$elem}";
        $expected = '11RUA DO OUVIDOR                    00100                                     12345678FULANO DE TAL               000005555555';
        $this->assertEquals($expected, $got);
    }

    public function testZ11MissingCep(): void
    {
        $std = new \stdClass();
        $std->LOGRADOURO = 'RUA DO OUVIDOR';
        $std->NUMERO = '100';
        $std->COMPLEMENTO = null;
        $std->BAIRRO = '';
        $std->CONTATO = 'FULANO DE TAL';
        $std->TELEFONE = '5555555';
        $elem = new Z11($std);
        $got = "{$elem}";
        $expected = '11RUA DO OUVIDOR                    00100                                     00000000FULANO DE TAL               000005555555';
        $this->assertEquals($expected, $got);
        $this->assertNotEmpty($elem->errors);
    }
}
