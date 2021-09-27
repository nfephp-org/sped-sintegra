<?php

namespace NFePHP\Sintegra\Elements;

/**
 *  Notas fiscais de compras e vendas
 *
 * No campo 10, o CFOP (posições 54 a 56) é aquele relativo a operação do ponto de vista
 * do contribuinte informante, ou seja, nas suas aquisições/entradas, o informante deverá
 * indicar, nesse campo, o CFOP de entrada, consignado no seu Livro de Entradas (iniciado
 * por 1, 2 ou 3), e não o CFOP (iniciado por 5 ou 6) constante no documento fiscal que
 * acobertou a operação, que se refere a operação de saída/prestação do emitente do
 * documento fiscal. A mesma observação é válida para o CFOP dos registros tipo 51
 *(campo 09), 53 (campo 10) e 70 (campo 10).
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;

class Z50 extends Element implements ElementInterface
{
    const REGISTRO = '50';

    protected $parameters = [
        'CNPJ' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{11,14}$',
            'required' => true,
            'info' => 'CNPJ do emitente nas entradas e dos destinátarios nas saídas',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'IE' => [
            'type' => 'string',
            'regex' => '^ISENTO|[0-9]{2,14}$',
            'required' => false,
            'info' => 'Inscrição estadual do emitente nas entradas e do destinatário nas saídas',
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
            'regex' => '^(AC|AL|AM|AP|BA|CE|DF|ES|GO|MA|MG|MS|MT|PA|PB|PE|PI|PR|RJ|RN|RO|RR|RS|SC|SE|SP|TO|EX)$',
            'required' => true,
            'info' => 'Sigla da Unidade da Federação do emitente',
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
        'EMITENTE' => [
            'type' => 'string',
            'regex' => '^(P|T)$',
            'required' => true,
            'info' => 'Emitente da Nota Fiscal (P- próprio/T-terceiros)',
            'format' => '',
            'length' => 1
        ],
        'VL_TOTAL' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor total da nota fiscal (com 2 decimais)',
            'format' => '11v2',
            'length' => 13
        ],
        'VL_BC_ICMS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Base de Cálculo do ICMS (com 2 decimais)',
            'format' => '11v2',
            'length' => 13
        ],
        'VL_ICMS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Montante do imposto (com 2 decimais)',
            'format' => '11v2',
            'length' => 13
        ],
        'ISENTA_NTRIBUTADA' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor amparado por isenção ou não incidência (com 2 decimais)',
            'format' => '11v2',
            'length' => 13
        ],
        'OUTRAS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor que não confira débito ou crédito do ICMS (com 2 decimais)',
            'format' => '11v2',
            'length' => 13
        ],
        'ALIQUOTA' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Alíquota do ICMS (com 2 decimais)',
            'format' => '2v2',
            'length' => 4
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
            '24', //24 - Autorização de Carregamento e Transporte, modelo 24
            '25', //25 - Manifesto de Carga, modelo 25
            '26', //26 - Conhecimento de Transporte Multimodal de Cargas, modelo 26
            '27', //27 - Nota Fiscal de Serviço de Transporte Ferroviário, modelo 27
            '55', //55 - Nota Fiscal Eletrônica, modelo 55
            '57', //57 - Conhecimento de Transporte Eletrônico, modelo 57
            '60', //60 - Cupom Fiscal Eletrônico, CF-e- ECF, modelo 60
            '63', //63 - Bilhete de Passagem Eletrônico, modelo 63
            '65', //65 - Nota Fiscal de Consumidor Eletrônica, modelo 65
            '67', //67 - Conhecimento de Transporte Eletrônico para Outros Serviços, modelo 67
        ];
        if (!in_array($this->std->cod_mod, $possible)) {
            throw new \Exception("Erro: Bloco5, campo 50 - "
                . "Código [{$this->std->cod_mod}] de documento fiscal não encontrado.");
        }
    }
}
