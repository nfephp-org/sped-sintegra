<?php

namespace NFePHP\Sintegra\Elements;

/**
 * Serviços de comunicação e telecomunicação
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z77 extends Element implements ElementInterface
{
    const REGISTRO = '77';

    protected $parameters = [
        'CNPJ' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{11,14}$',
            'required' => true,
            'info' => 'CNPJ/CPF do tomador do serviço',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'IE' => [
            'type' => 'string',
            'regex' => '^ISENTO|[0-9]{2,14}$',
            'required' => false,
            'info' => 'Inscrição estadual do tomador do serviço',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'SERIE' => [
            'type' => 'string',
            'regex' => '^[0-9]{1,2}$',
            'required' => true,
            'info' => 'Série do documento fiscal',
            'format' => '',
            'length' => 2
        ],
        'SUB_SERIE' => [
            'type' => 'string',
            'regex' => '^.{1,2}$',
            'required' => false,
            'info' => 'Série do documento fiscal',
            'format' => 'empty',
            'length' => 2
        ],
        'NUM_DOC' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,10}$',
            'required' => true,
            'info' => 'Número do documento fiscal',
            'format' => 'totalNumber',
            'length' => 10
        ],
        'CFOP' => [
            'type' => 'numeric',
            'regex' => '^(\d{4})$',
            'required' => true,
            'info' => 'Código Fiscal de Operação e Prestação',
            'format' => '',
            'length' => 4
        ],
        'TIPO_RECEITA' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1}$',
            'required' => true,
            'info' => 'Tipo de receita',
            'format' => '',
            'length' => 1
        ],
        'NUMERO_ITEM' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,3}$',
            'required' => true,
            'info' => 'Número de ordem do item na nota fiscal',
            'format' => 'totalNumber',
            'length' => 3
        ],
        'CODIGO_SERVICO' => [
            'type' => 'numeric',
            'regex' => '^.{1,11}$',
            'required' => true,
            'info' => 'Código do serviço do informante',
            'format' => '',
            'length' => 11
        ],
        'QUANTIDADE' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => '	Quantidade do produto (com 3 decimais)',
            'format' => 'totalNumber',
            'length' => 13
        ],
        'VL_SERVICO' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor bruto do serviço (valor unitário multiplicado por quantidade) - com 2 decimais',
            'format' => 'totalNumber',
            'length' => 12
        ],
        'OUTRAS_DESPESAS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor do Desconto Concedido no item (com 2 decimais).',
            'format' => 'totalNumber',
            'length' => 12
        ],
        'VL_BC_ICMS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Base de Cálculo do ICMS (com 2 decimais)',
            'format' => 'totalNumber',
            'length' => 12
        ],
        'ALIQUOTA' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Alíquota do ICMS (valor inteiro)',
            'format' => 'aliquota',
            'length' => 2
        ],
        'CNPJ_MF' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{11,14}$',
            'required' => true,
            'info' => 'CNPJ/MF da operadora de destino',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'TERMINAL' => [
            'type' => 'string',
            'regex' => '^[0-9]{1,10}$',
            'required' => false,
            'info' => 'Código que designa o usuário nal na rede do informante',
            'format' => 'totalNumber',
            'length' => 10
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
    }
}
