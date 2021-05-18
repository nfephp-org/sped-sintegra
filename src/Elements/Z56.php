<?php

namespace NFePHP\Sintegra\Elements;

/**
 *  Operações com veículos automotores novos
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z56 extends Element implements ElementInterface
{
    const REGISTRO = '56';

    protected $parameters = [
        'CNPJ' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{11,14}$',
            'required' => true,
            'info' => 'CNPJ do remetente nas entradas e dos destinátarios nas saídas',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'COD_MOD' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{2}$',
            'required' => true,
            'info' => 'Código do modelo da nota fiscal',
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
            'length' => 6
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
            'format' => 'empty',
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
        'CODIGO_PRODUTO' => [
            'type' => 'string',
            'regex' => '^.{1,14}$',
            'required' => true,
            'info' => 'Código do produto ou serviço do informante',
            'format' => 'empty',
            'length' => 14
        ],
        'TIPO_OPERACAO' => [
            'type' => 'string',
            'regex' => '^(1|2|3)$',
            'required' => true,
            'info' => 'Tipo de operação (1 - venda para concessionária; 2- "Faturamento Direto" - Convênio ICMS 51/00; 3 - Venda direta)',
            'format' => '',
            'length' => 1
        ],
        'CNPJ_CONCESSIONARIA' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{11,14}$',
            'required' => true,
            'info' => 'CNPJ da concessionária',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'ALIQUOTA_IPI' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Alíquota do IPI (com 2 decimais)',
            'format' => 'aliquota',
            'length' => 4
        ],
        'CHASSI' => [
            'type' => 'string',
            'regex' => '^.{5,17}$',
            'required' => true,
            'info' => 'Código do chassi do veículo',
            'format' => 'empty',
            'length' => 17
        ],
        'BRANCOS' => [
            'type' => 'string',
            'regex' => '',
            'required' => false,
            'info' => 'Brancos',
            'format' => 'empty',
            'length' => 39
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
