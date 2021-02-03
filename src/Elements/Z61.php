<?php

namespace NFePHP\Sintegra\Elements;

/**
 * - Exclusivo para empresas emissoras de Cupom Fiscal/ NFCe
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z61 extends Element implements ElementInterface
{
    const REGISTRO = '61';

    protected $parameters = [
        'BRANCOS_1' => [
            'type' => 'string',
            'regex' => '^[0-9]{14}$',
            'required' => false,
            'info' => 'Brancos',
            'format' => 'empty',
            'length' => 14
        ],
        'BRANCOS_2' => [
            'type' => 'string',
            'regex' => '^[0-9]{14}$',
            'required' => false,
            'info' => 'Brancos',
            'format' => 'empty',
            'length' => 14
        ],
        'DATA_EMISSAO' => [
            'type' => 'string',
            'regex' => '^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([12]\d{3})$',
            'required' => true,
            'info' => 'Data de emissão do(s) documento(s) fiscal(is)',
            'format' => '',
            'length' => 8
        ],
        'COD_MOD' => [
            'type' => 'string',
            'regex' => '^.{2,2}$',
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
        'SUB_SERIE' => [
            'type' => 'string',
            'regex' => '^.{1,2}$',
            'required' => false,
            'info' => 'Série do documento fiscal',
            'format' => 'empty',
            'length' => 2
        ],
        'NUM_INICIAL' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,9}$',
            'required' => true,
            'info' => 'Número do primeiro documento fiscal emitido no dia do mesmo modelo, série e subsérie',
            'format' => '',
            'length' => 6
        ],
        'NUM_FINAL' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,9}$',
            'required' => true,
            'info' => 'Número do primeiro documento fiscal emitido no dia do mesmo modelo, série e subsérie',
            'format' => '',
            'length' => 6
        ],
        'VL_TOTAL' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor total do(s) documento(s) fiscal(is)/Movimento diário (com 2 decimais)',
            'format' => 'totalNumber',
            'length' => 13
        ],
        'VL_BC_ICMS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Base de cálculo do(s) documento(s) fiscal(is)/Total diário (com 2 decimais)',
            'format' => 'totalNumber',
            'length' => 13
        ],
        'VL_ICMS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor do Montante do Imposto/Total diário (com 2 decimais)',
            'format' => 'totalNumber',
            'length' => 12
        ],
        'ISENTO_NTRIBUTADO' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor amparado por isenção ou não-incidência/Total diário (com 2 decimais)',
            'format' => 'totalNumber',
            'length' => 13
        ],
        'OUTRAS_DESPESAS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor que não confira débito ou crédito de ICMS/Total diário (com 2 decimais)',
            'format' => 'totalNumber',
            'length' => 13
        ],
        'ALIQUOTA' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Alíquota Utilizada no Cálculo do ICMS (com 2 decimais)',
            'format' => 'aliquota',
            'length' => 4
        ],
        'BRANCOS_3' => [
            'type' => 'string',
            'regex' => '^[0-9]{1}$',
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
        $std->BRANCOS_1 = '';
        $std->BRANCOS_2 = '';
        $std->BRANCOS_3 = '';
        $std->SUB_SERIE = '';

        $this->std = $this->standarize($std);
    }
}
