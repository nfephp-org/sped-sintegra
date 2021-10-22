<?php

/**
 * This file belongs to the NFePHP project
 * php version 7.0 or higher
 *
 * @category  Library
 * @package   NFePHP\Sintegra
 * @copyright 2019 NFePHP Copyright (c)
 * @license   https://opensource.org/licenses/MIT MIT
 * @author    Roberto L. Machado <linux.rlm@gmail.com>
 * @link      http://github.com/nfephp-org/sped-sintegra
 */

namespace NFePHP\Sintegra\Elements;

/**
 * Estado de MG
 *
 * REGISTRO '88STES' - Informações Referentes a Estoque de Produtos Sujeitos ao
 * Regime de Substituição Tributária ou de Produtos que Tiveram Mudança na
 * Forma de Tributação.
 *
 * @see http://www.fazenda.mg.gov.br/empresas/legislacao_tributaria/ricms_2002_seco/anexovii2002_6.html
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z88STES extends Element implements ElementInterface
{
    const REGISTRO = '88';
    protected $subtipo = 'STES';

    protected $parameters = [
        'CNPJ' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{11,14}$',
            'required' => true,
            'info' => 'CNPJ do informante',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'DATA_INVENTARIO' => [
            'type' => 'string',
            'regex' => '^(2[0-9]{3})(0?[1-9]|1[012])(0?[1-9]|[12][0-9]|3[01])$',
            'required' => true,
            'info' => 'Data do inventário',
            'format' => '',
            'length' => 8
        ],
        'CODIGO_PRODUTO' => [
            'type' => 'string',
            'regex' => '',
            'required' => true,
            'info' => 'Código do produto utilizado pelo informante',
            'format' => 'empty',
            'length' => 60
        ],
        'QUANTIDADE' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Quantidade do produto (com 3 casas decimais)',
            'format' => '10v3',
            'length' => 13
        ],
        'VL_ICMS_ST' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor do ICMS ST (com 2 casas decimais)',
            'format' => '10v2',
            'length' => 12
        ],
        'VL_ICMS_OP' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor do ICMS da operação própria (com 2 casas decimais)',
            'format' => '10v2',
            'length' => 12
        ],
        'BRANCOS' => [
            'type' => 'string',
            'regex' => '',
            'required' => false,
            'info' => 'Brancos',
            'format' => 'empty',
            'length' => 1
        ],
    ];

    /**
     * Constructor
     * @param \stdClass $std
     */
    public function __construct(\stdClass $std)
    {
        parent::__construct(self::REGISTRO);
        $this->std = $this->standarize($std);
        $this->postValidation();
    }
    
    /**
     * Validação secundária sobre as data informadas
     * @throws \Exception
     */
    public function postValidation()
    {
        $this->validDoc($this->std->cnpj, 'CNPJ');
    }
}
