<?php

namespace NFePHP\Sintegra\Elements;

/**
 * Substituição tributária
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z53 extends Element implements ElementInterface
{
    const REGISTRO = '53';

    protected $parameters = [
        'CNPJ' => [
            'type' => 'string',
            'regex' => '^[0-9]{14}$',
            'required' => false,
            'info' => 'CNPJ do remetente nas entradas e dos destinátarios nas saídas',
            'format' => '',
            'length' => 14
        ],
        'IE' => [
            'type' => 'string',
            'regex' => '^[0-9]{2,14}$',
            'required' => false,
            'info' => 'Inscrição estadual do remetente nas entradas e do destinatário nas saídas',
            'format' => '',
            'length' => 14
        ],
        'DATA_EMISSAO' => [
            'type' => 'string',
            'regex' => '^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([12]\d{3})$',
            'required' => true,
            'info' => 'Data de emissão na saída ou de recebimento na entrada',
            'format' => '',
            'length' => 8
        ],
        'UF' => [
            'type' => 'string',
            'regex' => '^.{2}$',
            'required' => true,
            'info' => 'Sigla da Unidade da Federação do remetente',
            'format' => '',
            'length' => 2
        ],
        'COD_MOD' => [
            'type' => 'string',
            'regex' => '^.{2}$',
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
            'regex' => '^[0-9]{1,9}$',
            'required' => true,
            'info' => 'Número do documento fiscal',
            'format' => '',
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
        'EMITENTE' => [
            'type' => 'string',
            'regex' => '^.{1}$',
            'required' => false,
            'info' => 'Emitente da Nota Fiscal (P- próprio/T-terceiros)',
            'format' => '',
            'length' => 1
        ],
        'VL_BC_ICMS_ST' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Base de cálculo de retenção do ICMS (com 2 decimais)',
            'format' => 'totalNumber',
            'length' => 13
        ],
        'VL_ICMS_RET' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'ICMS retido pelo substituto (com 2 decimais)',
            'format' => 'totalNumber',
            'length' => 13
        ],
        'DESPESAS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Soma das despesas acessórias (frete, seguro e outras - com 2 decimais)',
            'format' => 'totalNumber',
            'length' => 13
        ],
        'SITUACAO' => [
            'type' => 'string',
            'regex' => '^.{1}$',
            'required' => false,
            'info' => 'Situação da Nota fiscal',
            'format' => '',
            'length' => 1
        ],
        'CODIGO_ANTECIPACAO' => [
            'type' => 'string',
            'regex' => '^.{1}$',
            'required' => false,
            'info' => 'Código que identifica o tipo da Antecipação Tributária',
            'format' => '',
            'length' => 1
        ],
        'BRANCOS' => [
            'type' => 'numeric',
            'regex' => '^.{1}$',
            'required' => false,
            'info' => 'Brancos',
            'format' => '',
            'length' => 20
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
