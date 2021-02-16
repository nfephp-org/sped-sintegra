<?php

namespace NFePHP\Sintegra\Elements;

/**
 * Obrigatório para informar as condições do produto/serviço.
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z75 extends Element implements ElementInterface
{
    const REGISTRO = '75';

    protected $parameters = [
        'DT_INI' => [
            'type' => 'string',
            'regex' => '^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([12]\d{3})$',
            'required' => true,
            'info' => 'Data inicial das informações contidas no arquivo.',
            'format' => '',
            'length' => 8
        ],
        'DT_FIM' => [
            'type' => 'string',
            'regex' => '^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([12]\d{3})$',
            'required' => true,
            'info' => 'Data final das informações contidas no arquivo.',
            'format' => '',
            'length' => 8
        ],
        'CODIGO_PRODUTO' => [
            'type' => 'string',
            'regex' => '^.{1,14}$',
            'required' => true,
            'info' => 'Código do produto ou serviço do informante',
            'format' => 'empty',
            'length' => 14
        ],
        'CODIGO_NCM' => [
            'type' => 'string',
            'regex' => '^.{1,8}$',
            'required' => true,
            'info' => 'Codificação da Nomenclatura Comum do Mercosul',
            'format' => 'empty',
            'length' => 8
        ],
        'DESCRICAO' => [
            'type' => 'string',
            'regex' => '^.{1,53}$',
            'required' => true,
            'info' => 'Descrição do produto ou serviço',
            'format' => 'empty',
            'length' => 53
        ],
        'UN' => [
            'type' => 'string',
            'regex' => '^.{1,6}$',
            'required' => true,
            'info' => 'Unidade de medida de comercialização do produto ( un, kg, mt, m3, sc, frd, kWh, etc..)',
            'format' => 'empty',
            'length' => 6
        ],
        'ALIQUOTA_IPI' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Alíquota do IPI do produto (com 2 decimais)',
            'format' => 'aliquota',
            'length' => 5
        ],
        'ALIQUOTA_ICMS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Alíquota do ICMS aplicável a mercadoria ou serviço nas operações',
            'format' => 'aliquota',
            'length' => 4
        ],
        'REDUCAO_BASE_ICMS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => '% de Redução na base de cálculo do ICMS, nas operações internas (com 2 decimais)',
            'format' => 'totalNumber',
            'length' => 5
        ],
        'BASE_ICMS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Base de Cálculo do ICMS de substituição tributária (com 2 decimais))',
            'format' => 'totalNumber',
            'length' => 13
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