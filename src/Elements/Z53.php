<?php

/**
 * This file belongs to the NFePHP project
 * php version 7.0 or higher
 *
 * @category  Library
 * @package   NFePHP\Sintegra
 * @copyright 2019 NFePHP Copyright (c)
 * @license   https://opensource.org/licenses/MIT MIT
 * @author    Roberto L. Machado <linux.rlm@gmail.com>
 * @link      http://github.com/nfephp-org/sped-sintegra
 */

namespace NFePHP\Sintegra\Elements;

/**
 * Substituição tributária
 *
 * Os registros tipo 53 só deverão ser gerados por contribuintes substitutos
 * tributários. Substituto tributário é aquele a quem a legislação obriga a, no momento
 * da venda de seu produto, além de pagar o imposto próprio, fazer a retenção do
 * imposto referente às operações seguintes, recolhendo-o em separado daquele
 * referente a suas próprias operações. Ele está obrigado a gerar o registro 50 e o
 * registro 53, referentes a uma mesma operação. Substituído é o comerciante que
 *adquire a mercadoria com o imposto já retido.
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
            'regex' => '^[0-9]{11,14}$',
            'required' => false,
            'info' => 'CNPJ do remetente nas entradas e dos destinátarios nas saídas',
            'format' => '',
            'length' => 14
        ],
        'IE' => [
            'type' => 'string',
            'regex' => '^[0-9]{2,14}$|^ISENTO$',
            'required' => false,
            'info' => 'Inscrição estadual do remetente nas entradas e do destinatário nas saídas',
            'format' => '',
            'length' => 14
        ],
        'DATA_EMISSAO' => [
            'type' => 'string',
            'regex' => '^([12]\d{3})(0[1-9]|1[0-2])(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))$',
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
            'regex' => '^[0-9]{1,6}$',
            'required' => true,
            'info' => 'Número do documento fiscal',
            'format' => '',
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
        'EMITENTE' => [
            'type' => 'string',
            'regex' => '^(P|T)$',
            'required' => true,
            'info' => 'Emitente da Nota Fiscal (P - próprio; T - Terceiros)',
            'format' => '',
            'length' => 1
        ],
        'VL_BC_ICMS_ST' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Base de cálculo de retenção do ICMS (com 2 decimais)',
            'format' => '11v2',
            'length' => 13
        ],
        'VL_ICMS_RET' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'ICMS retido pelo substituto (com 2 decimais)',
            'format' => '11v2',
            'length' => 13
        ],
        'DESPESAS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Soma das despesas acessórias (frete, seguro e outras '
            . 'com 2 decimais)',
            'format' => '11v2',
            'length' => 13
        ],
        'SITUACAO' => [
            'type' => 'string',
            'regex' => '^(S|N|E|X|2|4)$',
            'required' => true,
            'info' => 'Situação da Nota fiscal ('
            . 'N - Documento Fiscal Normal; '
            . 'S - Documento Fiscal Cancelado; '
            . 'E - Lançamento Extemporâneo de Documento Fiscal Normal; '
            . 'X - Lançamento Extemporâneo de Documento Fiscal Cancelado; '
            . '2 - Documento com USO DENEGADO; '
            . '4 - Documento com USO inutilizado)',
            'format' => '',
            'length' => 1
        ],
        'CODIGO_ANTECIPACAO' => [
            'type' => 'string',
            'regex' => '^(1|2|3|4|5|6| )$',
            'required' => true,
            'info' => 'Código que identifica o tipo da Antecipação Tributária',
            'format' => '',
            'length' => 1
        ],
        'BRANCOS' => [
            'type' => 'string',
            'regex' => '',
            'required' => false,
            'info' => 'Brancos',
            'format' => 'empty',
            'length' => 29
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
        $this->postValidation();
    }
}
