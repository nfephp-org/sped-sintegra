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
 * REGISTRO '88STITNF' - Informações sobre Itens das Notas Fiscais Relativas
 * à Entrada de Produtos Sujeitos ao Regime de Substituição Tributária.
 *
 * @see http://www.fazenda.mg.gov.br/empresas/legislacao_tributaria/ricms_2002_seco/anexovii2002_6.html
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z88STITNF extends Element implements ElementInterface
{
    const REGISTRO = '88';
    protected $subtipo = 'STITNF';

    protected $parameters = [
        'CNPJ' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{11,14}$',
            'required' => true,
            'info' => 'CNPJ do informante',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'COD_MOD' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{2}$',
            'required' => true,
            'info' => 'Código do modelo do documento fiscal',
            'format' => 'totalNumber',
            'length' => 2
        ],
        'SERIE' => [
            'type' => 'string',
            'regex' => '^[0-9]{1,3}$',
            'required' => true,
            'info' => 'Série do documento fiscal',
            'format' => '',
            'length' => 3
        ],
        'NUM_DOC' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,6}$',
            'required' => true,
            'info' => 'Número do documento fiscal',
            'format' => 'totalNumber',
            'length' => 9
        ],
        'CFOP' => [
            'type' => 'numeric',
            'regex' => "^[1,2,3,5,6,7]{1}[0-9]{3}$",
            'required' => true,
            'info' => 'Código Fiscal de Operação e Prestação',
            'format' => '',
            'length' => 4
        ],
        'CST' => [
            'type' => 'string',
            'regex' => '^.{1,3}$',
            'required' => true,
            'info' => 'Código da Situação Tributária',
            'format' => '',
            'length' => 3
        ],
        'NUMERO_ITEM' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,3}$',
            'required' => true,
            'info' => 'Número de ordem do item na nota fiscal',
            'format' => 'totalNumber',
            'length' => 3
        ],
        'DATA_ENTRADA' => [
            'type' => 'string',
            'regex' => '^(2[0-9]{3})(0?[1-9]|1[012])(0?[1-9]|[12][0-9]|3[01])$',
            'required' => true,
            'info' => '	Data da efetiva Entrada (formato AAAAMMDD)',
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
            'format' => '8v3',
            'length' => 11
        ],
        'VL_PRODUTO' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor Bruto do Produto (com 2 casas decimais)',
            'format' => '10v2',
            'length' => 12
        ],
        'VL_DESCONTO' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor do Desconto concedido no item (com 2 casas decimais)',
            'format' => '10v2',
            'length' => 12
        ],
        'VL_BC_ICMS_OP' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Base de Cálculo do ICMS da Operação Própria (com 2 decimais)',
            'format' => '10v2',
            'length' => 12
        ],
        'VL_BC_ICMS_ST' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Base de Cálculo do ICMS da Substituição Tributária (com 2 decimais)',
            'format' => '10v2',
            'length' => 12
        ],
        'ALIQUOTA_ICMS_ST' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Alíquota do ICMS ST (com 2 decimais)',
            'format' => '2v2',
            'length' => 4
        ],
        'ALIQUOTA_ICMS_OP' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Alíquota do ICMS/ST (com 2 decimais)',
            'format' => '2v2',
            'length' => 4
        ],
        'VL_IPI' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor do IPI (com 2 casas decimais)',
            'format' => '10v2',
            'length' => 12
        ],
        'CHAVE_NFE' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{44}$',
            'required' => true,
            'info' => 'Chave da NF-e',
            'format' => '',
            'length' => 44
        ],
    ];

    /**
     * Constructor
     * @param \stdClass $std
     */
    public function __construct(\stdClass $std)
    {
        parent::__construct(self::REGISTRO, 237);
        $this->std = $this->standarize($std);
    }
}
