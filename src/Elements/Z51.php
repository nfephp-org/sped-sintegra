<?php

namespace NFePHP\Sintegra\Elements;

/**
 * Total de nota fiscal quanto ao IPI
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z51 extends Element implements ElementInterface
{
    const REGISTRO = '51';
    const LEVEL = 0;
    const PARENT = '';
}
