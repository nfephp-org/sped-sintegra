<?php

namespace NFePHP\Sintegra\Elements;

/**
 * - Exclusivo para empresas emissoras de Cupom Fiscal
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z60I extends Element implements ElementInterface
{
    const REGISTRO = '60';
    protected $subtipo = 'I';

    protected $parameters = [];
}
