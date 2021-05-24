<?php

namespace NFePHP\Sintegra\Elements;

/**
 * Total de nota fiscal quanto ao IPI
 *
 * Os registros tipo 51 deverão ser gerados somente por contribuintes de IPI.
 * Os contribuintes exclusivamente de ICMS não deverão informar registros tipo 51, ainda que
 *  tenham recebido mercadorias sujeitas ao IPI.
 * Só deverão ser informadas no registro tipo 51 operações acobertadas por notas fiscais
 * modelo 1 ou 1A (código de modelo = 01 no tipo 50), não devendo ser informadas
 * operações acobertadas por outros modelos de documentos fiscais (principalmente os
 * modelos 06 e 22, que são informados somente no tipo 50). Observar que no lay out do
 * tipo 51 não existe campo para modelo de documento fiscal, sendo que o validador
 * SINTEGRA assume que todos os registros são modelo 01 para comparação das críticas
 * de integridade relacional entre os tipos 50 e 51.
 * Deve haver correspondência com a NF indicada no tipo 50 correspondente, conter os
 * mesmos, CGC, número da nota, CFOP, data de emissão da nota, série da nota, valor
 * total e a mesma situação.
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z51 extends Element implements ElementInterface
{
    const REGISTRO = '51';

    protected $parameters = [
        'CNPJ' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{14}$',
            'required' => false,
            'info' => 'CNPJ do remetente nas entradas e dos destinátarios nas saídas',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'IE' => [
            'type' => 'string',
            'regex' => '^ISENTO|[0-9]{2,14}$',
            'required' => false,
            'info' => 'Inscrição estadual do remetente nas entradas e do destinatário nas saídas',
            'format' => '',
            'length' => 14
        ],
        'DATA_EMISSAO' => [
            'type' => 'string',
            'regex' => '^(2[0-9]{3})(0?[1-9]|1[012])(0?[1-9]|[12][0-9]|3[01])$',
            'required' => true,
            'info' => 'Data de emissão na saída ou de recebimento na entrada',
            'format' => '',
            'length' => 8
        ],
        'UF' => [
            'type' => 'string',
            'regex' => '^(AC|AL|AM|AP|BA|CE|DF|ES|GO|MA|MG|MS|MT|PA|PB|PE|PI|PR|RJ|RN|RO|RR|RS|SC|SE|SP|TO)$',
            'required' => true,
            'info' => 'Sigla da Unidade da Federação do remetente',
            'format' => '',
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
        'VL_TOTAL' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor total da nota fiscal (com 2 decimais)',
            'format' => '11v2',
            'length' => 13
        ],
        'VL_TOTAL_IPI' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Montante do IPI (com 2 decimais)',
            'format' => '11v2',
            'length' => 13
        ],
        'ISENTA_NTRIBUTADA' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor amparado por isenção ou não incidência do IPI (com 2 decimais)',
            'format' => '11v2',
            'length' => 13
        ],
        'OUTRAS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => false,
            'info' => 'Valor que não confira débito ou crédito do ICMS (com 2 decimais)',
            'format' => '11v2',
            'length' => 13
        ],
        'BRANCOS' => [
            'type' => 'string',
            'regex' => '',
            'required' => false,
            'info' => 'Brancos',
            'format' => 'empty',
            'length' => 20
        ],
        'SITUACAO' => [
            'type' => 'string',
            'regex' => '^(S|N|E|X|2|4)$',
            'required' => true,
            'info' => 'Situação da Nota fiscal (N - Documento Fiscal Normal; S - Documento Fiscal Cancelado; E - Lançamento Extemporâneo de Documento Fiscal Normal; X - Lançamento Extemporâneo de Documento Fiscal Cancelado; 2 - Documento com USO DENEGADO; 4 - Documento com USO inutilizado)',
            'format' => '',
            'length' => 1
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
