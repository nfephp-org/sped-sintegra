<?php

namespace NFePHP\Sintegra\Elements;

/**
 *  Notas fiscais de compras e vendas
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z50 extends Element implements ElementInterface
{
    const REGISTRO = '50';
    const LEVEL = 0;
    const PARENT = '';
}
