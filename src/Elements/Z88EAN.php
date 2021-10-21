<?php

namespace NFePHP\Sintegra\Elements;

/**
 * Estado de MG
 *
 * REGISTRO "88EAN" - Informação do número do código de barras do produto
 *
 * @see http://www.fazenda.mg.gov.br/empresas/legislacao_tributaria/ricms_2002_seco/anexovii2002_6.html
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z88EAN extends Element implements ElementInterface
{
    const REGISTRO = '88';
    protected $subtipo = 'EAN';

    protected $parameters = [
        'VERSAO_EAN' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{11,14}$',
            'required' => true,
            'info' => 'Versão do código EAN (08, 12, 13 ou 14)',
            'format' => '',
            'length' => 2
        ],
        'CODIGO_PRODUTO' => [
            'type' => 'numeric',
            'regex' => '',
            'required' => true,
            'info' => 'Código do produto ou serviço utilizado pelo contribuinte',
            'format' => 'empty',
            'length' => 14
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
            'info' => 'Unidade de medida de comercialização do produto (un, kg, mt, m3, sc, frd, kWh, etc..)',
            'format' => 'empty',
            'length' => 6
        ],
        'CODIGO_BARRAS' => [
            'type' => 'numeric',
            'regex' => '',
            'required' => true,
            'info' => 'Código de Barra EAN',
            'format' => '',
            'length' => 14
        ],
        'BRANCOS' => [
            'type' => 'string',
            'regex' => '',
            'required' => false,
            'info' => 'Preencher posições com espaços em branco',
            'format' => '',
            'length' => 32
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
