<?php

namespace NFePHP\Sintegra\Tests\Elements;

use NFePHP\Sintegra\Elements\Z10;
use PHPUnit\Framework\TestCase;

class Z10Test extends TestCase
{
    public function testZ10CnpjSuccess(): void
    {
        $std = new \stdClass();
        $std->CNPJ = '77774523000110';
        $std->IE = null;
        $std->NOME_CONTRIBUINTE = 'FULANO DE TAL LTDA';
        $std->MUNICIPIO = 'BREJO SECO';
        $std->UF = 'MA';
        $std->FAX = null;
        $std->DT_INI = '20210101';
        $std->DT_FIM = '20210131';
        $std->COGIGO_MAGNETICO = '1';
        $std->COGIGO_NATUREZAS = '3';
        $std->COGIGO_FINALIDADE = '1';

        $elem = new Z10($std);
        $got = "{$elem}";
        $expected = '1077774523000110              FULANO DE TAL LTDA                 BREJO SECO                    MA00000000002021010120210131131';

        $this->assertEquals($expected, $got);
        $this->assertEquals($elem->errors, []);
    }

    public function testZ10CpfSuccess(): void
    {
        $std = new \stdClass();
        $std->CNPJ = '50795722052';
        $std->IE = null;
        $std->NOME_CONTRIBUINTE = 'FULANO DE TAL LTDA';
        $std->MUNICIPIO = 'BREJO SECO';
        $std->UF = 'MA';
        $std->FAX = null;
        $std->DT_INI = '20210101';
        $std->DT_FIM = '20210131';
        $std->COGIGO_MAGNETICO = '1';
        $std->COGIGO_NATUREZAS = '3';
        $std->COGIGO_FINALIDADE = '1';

        $elem = new Z10($std);
        $got = "{$elem}";
        $expected = '1000050795722052              FULANO DE TAL LTDA                 BREJO SECO                    MA00000000002021010120210131131';

        $this->assertEquals($expected, $got);
        $this->assertEquals($elem->errors, []);
    }

    public function testZ10InvalidCnpj(): void
    {
        $std = new \stdClass();
        $std->CNPJ = '777745230';
        $std->IE = null;
        $std->NOME_CONTRIBUINTE = 'FULANO DE TAL LTDA';
        $std->MUNICIPIO = 'BREJO SECO';
        $std->UF = 'MA';
        $std->FAX = null;
        $std->DT_INI = '20210101';
        $std->DT_FIM = '20210131';
        $std->COGIGO_MAGNETICO = '1';
        $std->COGIGO_NATUREZAS = '3';
        $std->COGIGO_FINALIDADE = '1';

        $elem = new Z10($std);
        $got = "{$elem}";
        $expected = '1000000777745230              FULANO DE TAL LTDA                 BREJO SECO                    MA00000000002021010120210131131';
        $this->assertEquals($expected, $got);
        $message = '[10] campo: CNPJ valor incorreto [777745230]. (validação: ^[A-Z0-9]{11,14}$) Número de inscrição do estabelecimento matriz da pessoa jurídica no CNPJ ou CPF.';
        $this->assertEquals($elem->errors[0]->message, $message);
        $message = '[10] campo: CNPJ/CPF É inválido.';
        $this->assertEquals($elem->errors[1]->message, $message);
    }

    public function testBuildWithAlphanumericCnpj(): void
    {
        $std = new \stdClass();
        $std->CNPJ = 'NLG6401C000144';
        $std->IE = null;
        $std->NOME_CONTRIBUINTE = 'FULANO DE TAL LTDA';
        $std->MUNICIPIO = 'BREJO SECO';
        $std->UF = 'MA';
        $std->FAX = null;
        $std->DT_INI = '20210101';
        $std->DT_FIM = '20210131';
        $std->COGIGO_MAGNETICO = '1';
        $std->COGIGO_NATUREZAS = '3';
        $std->COGIGO_FINALIDADE = '1';

        $elem = new Z10($std);
        $got = "{$elem}";
        $expected = '10NLG6401C000144              FULANO DE TAL LTDA                 BREJO SECO                    MA00000000002021010120210131131';

        $this->assertEquals($expected, $got);
        $this->assertEquals($elem->errors, []);
    }
}
