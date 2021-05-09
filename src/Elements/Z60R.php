<?php

namespace NFePHP\Sintegra\Elements;

/**
 * Resumo Mensal - Registro de mercadoria/produto ou serviço processado em equipamento Emissor de Cupom Fiscal.
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z60R extends Element implements ElementInterface
{
    const REGISTRO = '60';
    
    protected $subtipo = 'R';
    
    protected $parameters = [];
}
