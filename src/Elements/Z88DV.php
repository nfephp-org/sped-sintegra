<?php

namespace NFePHP\Sintegra\Elements;

/**
 * Estado de MG
 *
 * REGISTRO "88DV" - Informações sobre itens registrados em Cupom Fiscal relativos à Entrada de Produtos em Devolução ou Troca
 *
 * @see http://www.fazenda.mg.gov.br/empresas/legislacao_tributaria/ricms_2002_seco/anexovii2002_6.html
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z88DV extends Element implements ElementInterface
{
    const REGISTRO = '88DV';

    protected $parameters = [
        'DATA_EMISSAO' => [
            'type' => 'string',
            'regex' => '^(2[0-9]{3})(0?[1-9]|1[012])(0?[1-9]|[12][0-9]|3[01])$',
            'required' => true,
            'info' => 'Data de emissão da Nota Fiscal global diária (formato AAAAMMDD)',
            'format' => '',
            'length' => 8
        ],
        'SERIE' => [
            'type' => 'string',
            'regex' => '^[0-9]{1,3}$',
            'required' => true,
            'info' => 'Número de Série da Nota Fiscal global diária',
            'format' => '',
            'length' => 3
        ],
        'NUM_DOC' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,6}$',
            'required' => true,
            'info' => 'Número da Nota Fiscal global diária',
            'format' => 'totalNumber',
            'length' => 6
        ],
        'NUM_COO' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,6}$',
            'required' => true,
            'info' => 'Número do Contador de Ordem de Operação - COO do Cupom Fiscal de venda do produto devolvido ou trocado',
            'format' => 'totalNumber',
            'length' => 6
        ],
        'DATA_EMISSAO_CUPOM' => [
            'type' => 'string',
            'regex' => '^(2[0-9]{3})(0?[1-9]|1[012])(0?[1-9]|[12][0-9]|3[01])$',
            'required' => true,
            'info' => 'Data de emissão do Cupom Fiscal de venda do produto devolvido ou trocado (formato AAAAMMDD)',
            'format' => '',
            'length' => 8
        ],
        'NUMERO_ITEM' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,3}$',
            'required' => true,
            'info' => 'Número de ordem do item devolvido no Cupom Fiscal de origem',
            'format' => 'totalNumber',
            'length' => 3
        ],
        'CODIGO_PRODUTO' => [
            'type' => 'numeric',
            'regex' => '',
            'required' => true,
            'info' => 'Código do produto devolvido ou trocado',
            'format' => 'empty',
            'length' => 14
        ],
        'QUANTIDADE' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Quantidade do produto devolvido (com 3 decimais)',
            'format' => '10v3',
            'length' => 13
        ],
        'RELATORIO_NUM_COO' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,6}$',
            'required' => true,
            'info' => 'Número do Contador de Ordem de Operação - COO do Relatório Gerencial de Devolução/Troca',
            'format' => 'totalNumber',
            'length' => 6
        ],
        'RELATORIO_DATA_EMISSAO' => [
            'type' => 'string',
            'regex' => '^(2[0-9]{3})(0?[1-9]|1[012])(0?[1-9]|[12][0-9]|3[01])$',
            'required' => true,
            'info' => 'Data de emissão do Relatório Gerencial de Devolução/Troca (formato AAAAMMDD)',
            'format' => '',
            'length' => 8
        ],
        'NUM_FAB' => [
            'type' => 'string',
            'regex' => '^.{1,20}$',
            'required' => true,
            'info' => 'Número de série de fabricação do ECF que emitiu o Cupom Fiscal de venda',
            'format' => 'empty',
            'length' => 20
        ],
        'CNPJ' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{11,14}$',
            'required' => true,
            'info' => 'Nº do CNPJ/CPF do responsável pela devolução/troca',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'VL_UNITARIO' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor unitário da mercadoria (com 2 decimais)',
            'format' => '10v2',
            'length' => 12
        ],
        'VL_BC_ICMS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Base de Cálculo do ICMS (com 2 decimais)',
            'format' => '10v2',
            'length' => 12
        ],
        'VL_ICMS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Montante do imposto (com 2 decimais)',
            'format' => '10v2',
            'length' => 12
        ]
    ];

    /**
     * Constructor
     * @param \stdClass $std
     */
    public function __construct(\stdClass $std)
    {
        parent::__construct(self::REGISTRO, 149);
        $this->std = $this->standarize($std);
    }
}
