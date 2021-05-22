<?php

namespace NFePHP\Sintegra\Elements;

/**
 *  Informações da carga transportada
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z71 extends Element implements ElementInterface
{
    const REGISTRO = '71';

    protected $parameters = [
        'CNPJ_TOM' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{11,14}$',
            'required' => true,
            'info' => 'CNPJ do tomador do serviço',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'IE_TOM' => [
            'type' => 'string',
            'regex' => '^ISENTO|[0-9]{2,14}$',
            'required' => false,
            'info' => 'Inscrição estadual do tomador do serviço',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'DATA_EMISSAO' => [
            'type' => 'string',
            'regex' => '^(2[0-9]{3})(0?[1-9]|1[012])(0?[1-9]|[12][0-9]|3[01])$',
            'required' => true,
            'info' => 'Data de emissão do conhecimento',
            'format' => '',
            'length' => 8
        ],
        'UF_TOM' => [
            'type' => 'string',
            'regex' => '^(AC|AL|AM|AP|BA|CE|DF|ES|GO|MA|MG|MS|MT|PA|PB|PE|PI|PR|RJ|RN|RO|RR|RS|SC|SE|SP|TO)$',
            'required' => true,
            'info' => 'Sigla da Unidade da Federação do tomador',
            'format' => 'empty',
            'length' => 2
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
            'regex' => '^[0-9]{1}$',
            'required' => true,
            'info' => 'Série do conhecimento',
            'format' => '',
            'length' => 1
        ],
        'SUB_SERIE' => [
            'type' => 'string',
            'regex' => '^.{1,2}$',
            'required' => false,
            'info' => 'Sub-Série do conhecimento',
            'format' => 'empty',
            'length' => 2
        ],
        'NUM_DOC' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,6}$',
            'required' => true,
            'info' => 'Número do conhecimento',
            'format' => 'totalNumber',
            'length' => 6
        ],
        'UF_REM_DEST' => [
            'type' => 'string',
            'regex' => '^(AC|AL|AM|AP|BA|CE|DF|ES|GO|MA|MG|MS|MT|PA|PB|PE|PI|PR|RJ|RN|RO|RR|RS|SC|SE|SP|TO)$',
            'required' => true,
            'info' => 'Unidade da Federação do remetente/destinatário da nota scal',
            'format' => 'empty',
            'length' => 2
        ],
        'CNPJ_REM_DEST' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{11,14}$',
            'required' => true,
            'info' => 'CNPJ do remetente/destinatário da nota scal',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'IE_REM_DEST' => [
            'type' => 'string',
            'regex' => '^ISENTO|[0-9]{2,14}$',
            'required' => false,
            'info' => 'Inscrição estadual do remetente/destinatário da nota fiscal',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'DATA_EMISSAO_NF' => [
            'type' => 'string',
            'regex' => '^(2[0-9]{3})(0?[1-9]|1[012])(0?[1-9]|[12][0-9]|3[01])$',
            'required' => true,
            'info' => 'Data de emissão da nota scal que acoberta a carga transportada',
            'format' => '',
            'length' => 8
        ],
        'COD_MOD_NF' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{2}$',
            'required' => true,
            'info' => 'Código do modelo da nota fiscal',
            'format' => 'totalNumber',
            'length' => 2
        ],
        'SERIE_NF' => [
            'type' => 'string',
            'regex' => '^[0-9]{1,3}$',
            'required' => true,
            'info' => 'Série da nota fiscal',
            'format' => '',
            'length' => 3
        ],
        'NUM_DOC_NF' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,6}$',
            'required' => true,
            'info' => 'Número da nota fiscal',
            'format' => 'totalNumber',
            'length' => 6
        ],
        'VL_TOTAL' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor total da nota fiscal (com 2 decimais)',
            'format' => '12v2',
            'length' => 14
        ],
        'BRANCOS' => [
            'type' => 'string',
            'regex' => '^[0-9]{1}$',
            'required' => false,
            'info' => 'Brancos',
            'format' => 'empty',
            'length' => 12
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
