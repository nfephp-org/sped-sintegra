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
 *  Este registro é obrigatório para os contribuintes que emitem nota fiscal modelo 1 ou 1-A
 *
 * Este registro é obrigatório somente para os contribuintes que emitem nota fiscal modelo 1
 * ou 1-A utilizando sistema de processamento eletrônico de dados. Portanto, para aqueles
 * que usam o referido sistema apenas para escrituração de livros fiscais, fica dispensada a
 * apresentação deste registro (veja § 4o da cláusula 5a do Conv ICMS 57/95).
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z54 extends Element implements ElementInterface
{
    const REGISTRO = '54';

    protected $parameters = [
        'CNPJ' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{11,14}$',
            'required' => true,
            'info' => 'CNPJ do remetente nas entradas e dos destinátarios nas saídas',
            'format' => 'totalNumber',
            'length' => 14
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
        'CST' => [
            'type' => 'string',
            'regex' => '^.{1,3}$',
            'required' => true,
            'info' => 'Código da Situação Tributária',
            'format' => '',
            'length' => 3
        ],
        'NUMERO_ITEM' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,3}$',
            'required' => true,
            'info' => 'Número de ordem do item na nota fiscal',
            'format' => 'totalNumber',
            'length' => 3
        ],
        'CODIGO_PRODUTO' => [
            'type' => 'string',
            'regex' => '^.{1,14}$',
            'required' => true,
            'info' => 'Código do produto ou serviço do informante',
            'format' => '',
            'length' => 14
        ],
        'QUANTIDADE' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Quantidade do produto (com 3 decimais)',
            'format' => '8v3',
            'length' => 11
        ],
        'VL_PRODUTO' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor bruto do produto (valor unitário multiplicado por quantidade) - com 2 decimais',
            'format' => '10v2',
            'length' => 12
        ],
        'DESCONTO' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor do Desconto Concedido no item (com 2 decimais).',
            'format' => '10v2',
            'length' => 12
        ],
        'VL_BC_ICMS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Base de cálculo do ICMS (com 2 decimais)',
            'format' => '10v2',
            'length' => 12
        ],
        'VL_BC_ICMS_ST' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Base de cálculo do ICMS de retenção na Substituição Tributária (com 2 decimais)',
            'format' => '10v2',
            'length' => 12
        ],
        'VL_IPI' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor do IPI (com 2 decimais)',
            'format' => '10v2',
            'length' => 12
        ],
        'ALIQUOTA' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => false,
            'info' => 'Alíquota Utilizada no Cálculo do ICMS (com 2 decimais)',
            'format' => '2v2',
            'length' => 4
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

    /**
     * Validação secundária sobre as data informadas
     * @throws \Exception
     */
    public function postValidation()
    {
        $possible = [
            '01', //01 - Nota Fiscal, modelo 1
            '02', //02 - Nota Fiscal de Venda a Consumidor, modelo 02
            '03', //03 - Nota Fiscal de Entrada, modelo 3
            '04', //04 - Nota Fiscal de Produtor, modelo 4
            '06', //06 - Nota Fiscal/Conta de Energia Elétrica, modelo 6
            '07', //07 - Nota Fiscal de Serviço de Transporte, modelo 7
            '08', //08 - Conhecimento de Transporte Rodoviário de Cargas, modelo 8
            '09', //09 - Conhecimento de Transporte Aquaviário de Cargas, modelo 9
            '10', //10 - Conhecimento Aéreo, modelo 10
            '11', //11 - Conhecimento de Transporte Ferroviário de Cargas, modelo 11
            '13', //13 - Bilhete de Passagem Rodoviário, modelo 13
            '14', //14 - Bilhete de Passagem Aquaviário, modelo 14
            '15', //15 - Bilhete de Passagem e Nota de Bagagem, modelo 15
            '16', //16 - Bilhete de Passagem Ferroviário, modelo 16
            '17', //17 - Despacho de Transporte, modelo 17
            '18', //18 - Resumo Movimento Diário, modelo 18
            '20', //20 - Ordem de Coleta de Carga, modelo 20
            '21', //21 - Nota Fiscal de Serviço de Comunicação, modelo 21
            '22', //22 - Nota Fiscal de Serviço de Telecomunicações, modelo 22
            '24', //Autorização de Carregamento e Transporte, modelo 24
            '25', //25 - Manifesto de Carga, modelo 25
            '26', //26 - Conhecimento de Transporte Multimodal de Cargas, modelo 26
            '27', //27 - Nota Fiscal de Serviço de Transporte Ferroviário, modelo 27
            '55', //55 - Nota Fiscal Eletrônica, modelo 55
            '57', //57 - Conhecimento de Transporte Eletrônico, modelo 57
            '60', //60 - Cupom Fiscal Eletrônico, CF-e- ECF, modelo 60
            '63', //63 - Bilhete de Passagem Eletrônico, modelo 63
            '65', //65 - Nota Fiscal de Consumidor Eletrônica, modelo 65
            '66', //66 - NOta Fiscal Energia Eletrica Eletrônica, modelo 66
            '67', //67 - Conhecimento de Transporte Eletrônico para Outros Serviços, modelo 67
        ];
        if (!in_array($this->std->cod_mod, $possible)) {
            $this->errors[] = (object) [
                'message' => "[$this->reg] campo: COD_MOD "
                . "Código [{$this->std->cod_mod}] de documento fiscal não encontrado.",
                'std' => $this->std
            ];
        }
    }
}
