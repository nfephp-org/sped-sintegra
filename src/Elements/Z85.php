<?php

namespace NFePHP\Sintegra\Elements;

/**
 * Informações de exportações
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z85 extends Element implements ElementInterface
{
    const REGISTRO = '85';

    protected $parameters = [
        'NUMERO_DECLARACAO' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,11}$',
            'required' => true,
            'info' => 'N.º da declaração de exportação',
            'format' => 'totalNumber',
            'length' => 11
        ],
        'DATA_EMISSAO' => [
            'type' => 'string',
            'regex' => '^(2[0-9]{3})(0?[1-9]|1[012])(0?[1-9]|[12][0-9]|3[01])$',
            'required' => true,
            'info' => 'Data da declaração',
            'format' => '',
            'length' => 8
        ],
        'NATUREZA_OPERACAO' => [
            'type' => 'numeric',
            'regex' => '^(1|2)$',
            'required' => true,
            'info' => 'Natureza da Exportação (1 – Exportação direta; 2 – Exportação indireta)',
            'format' => 'totalNumber',
            'length' => 1
        ],
        'NUMERO_REGISTRO' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,12}$',
            'required' => true,
            'info' => 'N.º do registro de Exportação',
            'format' => 'totalNumber',
            'length' => 12
        ],
        'DATA_REGISTRO' => [
            'type' => 'string',
            'regex' => '^(2[0-9]{3})(0?[1-9]|1[012])(0?[1-9]|[12][0-9]|3[01])$',
            'required' => true,
            'info' => 'Data do Registro de Exportação',
            'format' => '',
            'length' => 8
        ],
        'NUMERO_CONHECIMENTO_EMBARQUE' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,16}$',
            'required' => true,
            'info' => 'N.º do conhecimento de embarque',
            'format' => 'totalNumber',
            'length' => 16
        ],
        'DATA_CONHECIMENTO_EMBARQUE' => [
            'type' => 'string',
            'regex' => '^(2[0-9]{3})(0?[1-9]|1[012])(0?[1-9]|[12][0-9]|3[01])$',
            'required' => true,
            'info' => 'Data do conhecimento de embarque',
            'format' => '',
            'length' => 8
        ],
        '?' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{4}$',
            'required' => true,
            'info' => '',
            'format' => 'totalNumber',
            'length' => 4
        ],
        'COD_PAIS' => [
            'type' => 'string',
            'regex' => '^[0-9]{4}$',
            'required' => false,
            'info' => 'Código do país de destino da mercadoria',
            'format' => 'totalNumber',
            'length' => 4
        ],
        'RESERVADO' => [
            'type' => 'string',
            'regex' => '^[0]{8}$',
            'required' => false,
            'info' => 'Prrencher com zeros',
            'format' => 'totalNumber',
            'length' => 8
        ],
        'DATA_AVERB' => [
            'type' => 'string',
            'regex' => '^(2[0-9]{3})(0?[1-9]|1[012])(0?[1-9]|[12][0-9]|3[01])$',
            'required' => true,
            'info' => 'Data da averbação da declaração de exportação',
            'format' => '',
            'length' => 8
        ],
        'NUM_DOC' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,6}$',
            'required' => true,
            'info' => 'Número de nota scal de exportação emitida pelo exportador',
            'format' => 'totalNumber',
            'length' => 6
        ],
        'DATA_EMISSAO_NF' => [
            'type' => 'string',
            'regex' => '^(2[0-9]{3})(0?[1-9]|1[012])(0?[1-9]|[12][0-9]|3[01])$',
            'required' => true,
            'info' => 'Data da emissão da NF de exportação / revenda',
            'format' => '',
            'length' => 8
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
            'regex' => '^[0-9]{1,2}$',
            'required' => true,
            'info' => 'Série do documento fiscal',
            'format' => '',
            'length' => 2
        ],
        'BRANCOS' => [
            'type' => 'string',
            'regex' => '^.{19}$',
            'required' => false,
            'info' => 'Brancos',
            'format' => 'totalNumber',
            'length' => 19
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
