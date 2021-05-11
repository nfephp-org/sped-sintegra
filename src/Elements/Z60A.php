<?php

namespace NFePHP\Sintegra\Elements;

/**
 * Analítico - Identificador de cada situação tributária no final do dia de cada equipamento emissor de cupom fiscal
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z60A extends Element implements ElementInterface
{
    const REGISTRO = '60';
    protected $subtipo = 'A';
    
    protected $parameters = [];
}
