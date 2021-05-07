<?php

namespace NFePHP\Sintegra\Elements;

/**
 * - Exclusivo para empresas emissoras de Cupom Fiscal/ NFCe
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z61R extends Element implements ElementInterface
{
    const REGISTRO = '61';
    

    protected $parameters = [
        'MESTRE' => [
            'type' => 'string',
            'regex' => '^.{1,1}$',
            'required' => false,
            'info' => 'Mestre/Analítico/Resumo',
            'format' => '',
            'length' => 1
        ],
        'PERIODO_EMISSAO' => [
            'type' => 'string',
            'regex' => '^.{6,6}$',
            'required' => false,
            'info' => 'Mês e Ano de emissão dos documentos fiscais',
            'format' => '',
            'length' => 6
        ],
        'COD_PRODUTO' => [
            'type' => 'string',
            'regex' => '^.{1,14}$',
            'required' => true,
            'info' => 'Código do produto do informante',
            'format' => 'empty',
            'length' => 14
        ],
        'QUANTIDADE' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Quantidade do produto acumulada vendida no mês (com 3 decimais)',
            'format' => 'totalNumber',
            'length' => 13
        ],
        'VALOR_PRODUTO' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => false,
            'info' => 'Valor bruto do produto - valor acumulado da venda do produto no mês (com 2 decimais)',
            'format' => 'totalNumber',
            'length' => 16
        ],
        'BASE_ICMS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Base de cálculo do ICMS do valor acumulado no mês (com 2 decimais)',
            'format' => 'totalNumber',
            'length' => 16
        ],
        'ALIQUOTA' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Alíquota Utilizada no Cálculo do ICMS (com 2 decimais)',
            'format' => 'aliquota',
            'length' => 4
        ],
        'BRANCOS' => [
            'type' => 'string',
            'regex' => '^[0-9]{1}$',
            'required' => false,
            'info' => 'Brancos',
            'format' => 'empty',
            'length' => 54
        ],
    ];

    /**
     * Constructor
     * @param \stdClass $std
     */
    public function __construct(\stdClass $std)
    {
        parent::__construct(self::REGISTRO);
        $std->MESTRE = 'R';
        $std->BRANCOS = '';

        $this->std = $this->standarize($std);
    }
}
