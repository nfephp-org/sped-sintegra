<?php

namespace NFePHP\Sintegra\Elements;

/**
 * Guia Nacional de Recolhimento de Tributos Estaduais - GNRE
 *
 * Os registros tipo 55 só deverão ser informados por contribuintes substitutos
 * tributários.
 * Deverá ser gerado um registro para cada GNRE RECOLHIDA no período relativo ao
 * arquivo magnético.
 * Deverão ser informadas todas as GNRE recolhidas independentemente da UF
 * favorecida.
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z55 extends Element implements ElementInterface
{
    const REGISTRO = '55';
    
    protected $parameters = [
        'CNPJ' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{11,14}$',
            'required' => true,
            'info' => 'CNPJ do remetente nas entradas e dos destinátarios nas saídas',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'IE' => [
            'type' => 'string',
            'regex' => '^ISENTO|[0-9]{2,14}$',
            'required' => false,
            'info' => 'Inscrição estadual do remetente nas entradas e do destinatário nas saídas',
            'format' => 'totalNumber',
            'length' => 14
        ],
        "GNRE_DATA" => [
            'type' => 'string',
            'regex' => '^(2[0-9]{3})(0?[1-9]|1[012])(0?[1-9]|[12][0-9]|3[01])$',
            'required' => true,
            'info' => 'Data do pagamento do documento de arrecadação',
            'format' => '',
            'length' => 8
        ],
        'UF_SUBSTITUTO' => [
            'type' => 'string',
            'regex' => '^(AC|AL|AM|AP|BA|CE|DF|ES|GO|MA|MG|MS|MT|PA|PB|PE|PI|PR|RJ|RN|RO|RR|RS|SC|SE|SP|TO)$',
            'required' => true,
            'info' => 'Sigla da unidade da federação do contribuinte substituto tributário',
            'format' => 'empty',
            'length' => 2
        ],
        'UF_FAVORECIDA' => [
            'type' => 'string',
            'regex' => '^(AC|AL|AM|AP|BA|CE|DF|ES|GO|MA|MG|MS|MT|PA|PB|PE|PI|PR|RJ|RN|RO|RR|RS|SC|SE|SP|TO)$',
            'required' => true,
            'info' => 'Sigla da unidade da federação de destino (favorecida)',
            'format' => 'empty',
            'length' => 2
        ],
        "GNRE_BANCO" => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,3}$',
            'required' => true,
            'info' => 'Banco da GNRE preencher com o código do banco foi recolhida a GNRE',
            'format' => 'totalNumber',
            'length' => 3
        ],
        "GNRE_AGENCIA" => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,3}$',
            'required' => true,
            'info' => 'Banco da GNRE preencher com o código do banco foi recolhida a GNRE',
            'format' => 'totalNumber',
            'length' => 4
        ],
        "GNRE_NUMERO" => [
            'type' => 'string',
            'regex' => '^.{1,20}$',
            'required' => true,
            'info' => 'Número de autenticação bancária do documento de arrecadação',
            'format' => '',
            'length' => 20
        ],
        "DATA_VENCIMENTO" => [
            'type' => 'string',
            'regex' => '^(2[0-9]{3})(0?[1-9]|1[012])(0?[1-9]|[12][0-9]|3[01])$',
            'required' => true,
            'info' => 'Data do vencimento do ICMS substituído',
            'format' => '',
            'length' => 8
        ],
        "MES_ANO" => [
            'type' => 'numeric',
            'regex' => '^(0?[1-9]|1[012])(2[0-9]{3})$',
            'required' => true,
            'info' => 'Mês e ano referente à ocorrência do fato gerador, formato MMAAAA',
            'format' => '',
            'length' => 6
        ],
        "CONVENIO" => [
            'type' => 'string',
            'regex' => '^.{1,30}$',
            'required' => true,
            'info' => 'Preencher com o conteúdo do campo 15 da GNRE',
            'format' => '',
            'length' => 30
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
