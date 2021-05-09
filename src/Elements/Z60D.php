<?php

namespace NFePHP\Sintegra\Elements;

/**
 * Resumo Diário - Registro de mercadoria/produto ou serviço constante em
 * documento fiscal emitido por Terminal Ponto de Venda (PDV) ou equipamento
 * Emissor de Cupom Fiscal (ECF)
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
