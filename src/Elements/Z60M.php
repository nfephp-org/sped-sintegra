<?php

namespace NFePHP\Sintegra\Elements;

/**
 * Mestre - Identificador do equipamento
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z60M extends Element implements ElementInterface
{
    const REGISTRO = '60';
    protected $subtipo = 'M';
    
    protected $parameters = [];
}
