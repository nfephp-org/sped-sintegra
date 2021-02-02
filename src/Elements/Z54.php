<?php

namespace NFePHP\Sintegra\Elements;

/**
 *  Este registro é obrigatório para os contribuintes que emitem nota fiscal modelo 1 ou 1-A
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z54 extends Element implements ElementInterface
{
    const REGISTRO = '54';

    protected $parameters = [
        'CNPJ' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => false,
            'info' => 'CNPJ do remetente nas entradas e dos destinátarios nas saídas',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'COD_MOD' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Código do modelo da nota fiscal',
            'format' => '',
            'length' => 2
        ],
        'SERIE' => [
            'type' => 'string',
            'regex' => '^.{1,3}$',
            'required' => true,
            'info' => 'Série do documento fiscal',
            'format' => '',
            'length' => 3
        ],
        'NUM_DOC' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Número do documento fiscal',
            'format' => 'totalNumber',
            'length' => 6
        ],
        'CFOP' => [
            'type' => 'numeric',
            'regex' => '^(\d{4})$',
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
            'regex' => '^\d+(\.\d*)?|\.\d+$',
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
        'QUANTIDADE' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => '	Quantidade do produto (com 3 decimais)',
            'format' => 'totalNumber',
            'length' => 11
        ],
        'VL_PRODUTO' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor bruto do produto (valor unitário multiplicado por quantidade) - com 2 decimais',
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
            'info' => 'Base de cálculo do ICMS (com 2 decimais)',
            'format' => 'totalNumber',
            'length' => 12
        ],
        'VL_BC_ICMS_ST' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Base de cálculo do ICMS de retenção na Substituição Tributária (com 2 decimais)',
            'format' => 'totalNumber',
            'length' => 12
        ],
        'VL_IPI' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor do IPI (com 2 decimais)',
            'format' => 'totalNumber',
            'length' => 12
        ],
        'ALIQUOTA' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => false,
            'info' => 'Alíquota Utilizada no Cálculo do ICMS (com 2 decimais)',
            'format' => 'aliquota',
            'length' => 4
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
    }
}
