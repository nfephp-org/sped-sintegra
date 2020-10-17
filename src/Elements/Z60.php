<?php

namespace NFePHP\Sintegra\Elements;

/**
 * - Exclusivo para empresas emissoras de Cupom Fiscal 
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z60 extends Element implements ElementInterface
{
    const REGISTRO = '60';
    const LEVEL = 0;
    const PARENT = '';
}
