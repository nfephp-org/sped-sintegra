<?php

namespace NFePHP\Sintegra\Elements;

/**
 * Informações de exportações
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z85 extends Element implements ElementInterface
{
    const REGISTRO = '85';
    
    protected $parameters = [];
}
