<?php

namespace NFePHP\Sintegra\Elements;

/**
 * Guia Nacional de Recolhimento de Tributos Estaduais - GNRE 
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z55 extends Element implements ElementInterface
{
    const REGISTRO = '55';
    const LEVEL = 0;
    const PARENT = '';
}
