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
 * - Exclusivo para empresas emissoras de Cupom Fiscal
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z60M extends Element implements ElementInterface
{
    const REGISTRO = '60';
    protected $subtipo = 'M';

    protected $parameters = [
        'DATA_EMISSAO' => [
            'type' => 'string',
            'regex' => '^(2[0-9]{3})(0?[1-9]|1[012])(0?[1-9]|[12][0-9]|3[01])$',
            'required' => true,
            'info' => 'Data de emissão dos documentos fiscais',
            'format' => '',
            'length' => 8
        ],
        'NUM_FAB' => [
            'type' => 'string',
            'regex' => '^.{1,20}$',
            'required' => true,
            'info' => 'Número de série de fabricação do equipamento',
            'format' => 'empty',
            'length' => 20
        ],
        'NUMERO_SEQ' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,3}$',
            'required' => true,
            'info' => 'Número atribuído pelo estabelecimento ao equipamento',
            'format' => 'totalNumber',
            'length' => 3
        ],
        'COD_MOD' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{2}$',
            'required' => true,
            'info' => 'Código do modelo da nota fiscal',
            'format' => 'totalNumber',
            'length' => 2
        ],
        'NUMERO_CONTADOR_INICIO_DIA' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,6}$',
            'required' => true,
            'info' => 'Número do primeiro documento fiscal emitido no dia '
            . '(Número do Contador de Ordem de Operação - COO)',
            'format' => 'totalNumber',
            'length' => 6
        ],
        'NUMERO_CONTADOR_FINAL_DIA' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,6}$',
            'required' => true,
            'info' => 'Número do último documento fiscal emitido no dia '
            . '(Número do Contador de Ordem de Operação - COO)',
            'format' => 'totalNumber',
            'length' => 6
        ],
        'NUMERO_CONTADOR_REDUCAO_Z' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,6}$',
            'required' => true,
            'info' => 'Número do Contador de Redução Z (CRZ)',
            'format' => 'totalNumber',
            'length' => 6
        ],
        'NUMERO_CONTADOR_REINICIO_OP' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,3}$',
            'required' => true,
            'info' => 'Valor acumulado no Contador de Reinício de Operação (CRO)',
            'format' => 'totalNumber',
            'length' => 3
        ],
        'VL_TOTAL_BRUTO' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor acumulado no totalizador de Venda Bruta',
            'format' => '14v2',
            'length' => 16
        ],
        'VL_TOTAL_GERAL' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor acumulado no Totalizador Geral',
            'format' => '14v2',
            'length' => 16
        ],
        'BRANCOS' => [
            'type' => 'string',
            'regex' => '',
            'required' => false,
            'info' => 'Brancos',
            'format' => 'empty',
            'length' => 37
        ]
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
}
