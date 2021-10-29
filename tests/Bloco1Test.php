<?php

namespace NFePHP\Sintegra\Tests;

use PHPUnit\Framework\TestCase;

class Bloco1Test extends TestCase
{
    public function testZ10CNPJSuccess()
    {
        $std = new \stdClass();
        $std->cNPJ = '77774523000110';
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
        
        $elem = new \NFePHP\Sintegra\Elements\Z10($std);
        $got = "{$elem}";
        $expected = '1077774523000110              FULANO DE TAL LTDA                 BREJO SECO                    MA00000000002021010120210131131';
        
        $this->assertEquals($expected, $got);
        $this->assertEquals($elem->errors, []);
    }
    
    public function testZ10CPFSuccess()
    {
        $std = new \stdClass();
        $std->cNPJ = '50795722052';
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
        
        $elem = new \NFePHP\Sintegra\Elements\Z10($std);
        $got = "{$elem}";
        $expected = '1000050795722052              FULANO DE TAL LTDA                 BREJO SECO                    MA00000000002021010120210131131';
        
        $this->assertEquals($expected, $got);
        $this->assertEquals($elem->errors, []);
    }
    
    public function testZ10Fail()
    {
        $std = new \stdClass();
        $std->cNPJ = '777745230';
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
        
        $elem = new \NFePHP\Sintegra\Elements\Z10($std);
        $got = "{$elem}";
        $expected = '1000000777745230              FULANO DE TAL LTDA                 BREJO SECO                    MA00000000002021010120210131131';
        $this->assertEquals($expected, $got);
        $message = '[10] campo: CNPJ valor incorreto [777745230]. (validação: ^[0-9]{11,14}$) Número de inscrição do estabelecimento matriz da pessoa jurídica no CNPJ ou CPF.';
        $this->assertEquals($elem->errors[0]->message, $message);
        $message = '[10] campo: CNPJ/CPF É inválido.';
        $this->assertEquals($elem->errors[1]->message, $message);
    }
    
    public function testZ11Success()
    {
        $std = new \stdClass();
        $std->LOGRADOURO = 'RUA DO OUVIDOR';
        $std->NUMERO = '100';
        $std->COMPLEMENTO = null;
        $std->BAIRRO = '';
        $std->CEP = '12345678';
        $std->CONTATO = 'FULANO DE TAL';
        $std->TELEFONE = '5555555';
        $elem = new \NFePHP\Sintegra\Elements\Z11($std);
        $got = "{$elem}";
        $expected = '11RUA DO OUVIDOR                    00100                                     12345678FULANO DE TAL               000005555555';
        $this->assertEquals($expected, $got);
    }
    
    public function testZ11Fail()
    {
        $std = new \stdClass();
        $std->LOGRADOURO = 'RUA DO OUVIDOR';
        $std->NUMERO = '100';
        $std->COMPLEMENTO = null;
        $std->BAIRRO = '';
        //$std->CEP = '12345678';
        $std->CONTATO = 'FULANO DE TAL';
        $std->TELEFONE = '5555555';
        $elem = new \NFePHP\Sintegra\Elements\Z11($std);
        $got = "{$elem}";
        $expected = '11RUA DO OUVIDOR                    00100                                     00000000FULANO DE TAL               000005555555';
        $this->assertEquals($expected, $got);
        $this->assertNotEmpty($elem->errors);
    }
    
    public function testBlocoSuccess()
    {
        $b1 = new \NFePHP\Sintegra\Blocks\Block1();
        $std = new \stdClass();
        $std->cNPJ = '77774523000110';
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
        $b1->z10($std);
        
        $std = new \stdClass();
        $std->LOGRADOURO = 'RUA DO OUVIDOR';
        $std->NUMERO = '100';
        $std->COMPLEMENTO = null;
        $std->BAIRRO = '';
        $std->CEP = '12345678';
        $std->CONTATO = 'FULANO DE TAL';
        $std->TELEFONE = '5555555';
        $b1->z11($std);
        
        $bloco = $b1->get();
        
        $expected = "1077774523000110              FULANO DE TAL LTDA                 BREJO SECO                    MA00000000002021010120210131131\r\n"
            . "11RUA DO OUVIDOR                    00100                                     12345678FULANO DE TAL               000005555555\r\n";

        $this->assertEquals($expected, $bloco);
        
    }
}
