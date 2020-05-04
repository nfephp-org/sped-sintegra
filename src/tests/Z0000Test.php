<?php

namespace NFePHP\Sintegra\Tests;

use NFePHP\Sintegra\Elements\Z0000;
use PHPUnit\Framework\TestCase;
use stdClass;

class Z0000Test extends TestCase
{
    public function testZ0000()
    {
        $std = new stdClass();
        $std->tipo = '10';
        $std->cnpj = '00445335000113';
        $std->ie = '283305053';
        $std->nome_contribuinte = 'MOBILIARTE MADEIRA E ARTEFATOS EIRE';
        $std->municipio = 'Ponta Porã';
        $std->uf = 'SC';
        $std->fax = '49344201222';
        $std->dt_ini = '20200301';
        $std->dt_fim = '20200331';
        $std->codigo_magnetico = '3';
        $std->codigo_naturezas = '3';
        $std->codigo_finalidade = '1';
        $b1 = new Z0000($std);
        $resp = "{$b1}";

        $expected = '10|00445335000113|283305053|MOBILIARTE MADEIRA E ARTEFATOS EIRE|Ponta Porã|SC|49344201222
        20200301|20200331|3|3|1|';
        $this->assertEquals($expected, $resp);
    }
}