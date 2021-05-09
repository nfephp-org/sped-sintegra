<?php

namespace NFePHP\Sintegra\Elements;

/**
 * Nota fiscal de serviço de transporte
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z70 extends Element implements ElementInterface
{
    const REGISTRO = '70';
    
    protected $parameters = [];
}
