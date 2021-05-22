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

    protected $parameters = [
        'PERIODO_EMISSAO' => [
            'type' => 'string',
            'regex' => '^(2[0-9]{3})(0?[1-9]|1[012])$',
            'required' => true,
            'info' => 'Mês e Ano de emissão dos documentos fiscais',
            'format' => '',
            'length' => 6
        ],
        'CODIGO_PRODUTO' => [
            'type' => 'string',
            'regex' => '^.{1,14}$',
            'required' => true,
            'info' => 'Código do produto ou serviço do informante',
            'format' => 'empty',
            'length' => 14
        ],
        'QUANTIDADE' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Quantidade comercializada da mercadoria/produto no dia (com 3 decimais)',
            'format' => '10v3',
            'length' => 13
        ],
        'VL_PRODUTO' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor líquido (valor bruto diminuído do desconto) da mercadoria/produto ou serviço acumulado no mês (com 2 decimais)',
            'format' => '14v2',
            'length' => 16
        ],
        'VL_BC_ICMS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Base de cálculo do ICMS - valor acumulado no dia (com 2 decimais)',
            'format' => '14v2',
            'length' => 16
        ],
        'ALIQUOTA' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Identificador da Situação Tributária / Alíquota do ICMS (com 2 decimais)',
            'format' => '2v2',
            'length' => 4
        ],
        'BRANCOS' => [
            'type' => 'string',
            'regex' => '',
            'required' => false,
            'info' => 'Brancos',
            'format' => 'empty',
            'length' => 54
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
