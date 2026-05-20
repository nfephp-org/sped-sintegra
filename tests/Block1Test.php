<?php

namespace NFePHP\Sintegra\Tests;

use NFePHP\Sintegra\Blocks\Block1;
use PHPUnit\Framework\TestCase;

class Block1Test extends TestCase
{
    public function testBlock1Success(): void
    {
        $b1 = new Block1();

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
