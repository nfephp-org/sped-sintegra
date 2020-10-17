<?php

namespace NFePHP\Sintegra\Elements;

/**
 * - Exclusivo para empresas emissoras de Cupom Fiscal 
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z61 extends Element implements ElementInterface
{
    const REGISTRO = '61';
    const LEVEL = 0;
    const PARENT = '';
}
