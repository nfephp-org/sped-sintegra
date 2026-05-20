<?php

namespace NFePHP\Sintegra\Tests\Elements;

use NFePHP\Sintegra\Elements\Z88SMS;
use PHPUnit\Framework\TestCase;

class Z88SMSTest extends TestCase
{
    public function testBuildWithAlphanumericCnpj(): void
    {
        $std = new \stdClass();
        $std->CNPJ = 'NLG6401C000144';
        $std->MENSAGEM = 'Sem movimento saidas';

        $elem = new Z88SMS($std);
        $got = "{$elem}";
        $expected = '88SMSNLG6401C000144SEM MOVIMENTO SAIDAS                                                                                       ';

        $this->assertEquals($expected, $got);
        $this->assertEquals($elem->errors, []);
    }
}
