<?php

namespace NFePHP\Sintegra\Elements;

/**
 * Analítico - Identificador de cada situação tributária no final do dia de cada equipamento emissor de cupom fiscal
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;

class Z60A extends Element implements ElementInterface
{
    const REGISTRO = '60';
    protected $subtipo = 'A';

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
        'ALIQUOTA' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor acumulado no Totalizador Geral (com 2 decimais)',
            'format' => 'empty',
            'length' => 4
        ],
        'VL_TOTAL' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor acumulado no final do dia no totalizador parcial da situação tributária / alíquota indicada no campo 05 (com 2 decimais)',
            'format' => 'totalNumber',
            'length' => 12
        ],
        'BRANCOS' => [
            'type' => 'string',
            'regex' => '',
            'required' => false,
            'info' => 'Brancos',
            'format' => 'empty',
            'length' => 79
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
