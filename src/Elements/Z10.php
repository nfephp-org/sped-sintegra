<?php

namespace NFePHP\Sintegra\Elements;

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z10 extends Element implements ElementInterface
{
    const REGISTRO = '10';
    const LEVEL = 0;
    const PARENT = '';

    protected $parameters = [
        'CNPJ' => [
            'type' => 'string',
            'regex' => '^[0-9]{14}$',
            'required' => false,
            'info' => 'Número de inscrição do estabelecimento matriz da pessoa jurídica no CNPJ.',
            'format' => '',
            'length' => 14
        ],
        'IE' => [
            'type' => 'string',
            'regex' => '^[0-9]{2,14}$',
            'required' => false,
            'info' => 'Número de inscrição do estudal.',
            'format' => '',
            'length' => 14
        ],
        'NOME_CONTRIBUINTE' => [
            'type' => 'string',
            'regex' => '^.{2,35}$',
            'required' => true,
            'info' => 'Nome comercial (razao social)',
            'format' => '',
            'length' => 35
        ],
        'MUNICIPIO' => [
            'type' => 'string',
            'regex' => '^.{2,30}$',
            'required' => true,
            'info' => 'Municipio do estabelicimento',
            'format' => '',
            'length' => 30
        ],
        'UF' => [
            'type' => 'string',
            'regex' => '^.{2}$',
            'required' => true,
            'info' => 'Sigla da Unidade da Federação da pessoa',
            'format' => '',
            'length' => 2
        ],
        'FAX' => [
            'type' => 'string',
            'regex' => '^.{10}$',
            'required' => false,
            'info' => 'Telefone do estabelicimento',
            'format' => '',
            'length' => 10
        ],
        'DT_INI' => [
            'type' => 'string',
            'regex' => '^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([12]\d{3})$',
            'required' => true,
            'info' => 'Data inicial das informações contidas no arquivo.',
            'format' => '',
            'length' => 8
        ],
        'DT_FIM' => [
            'type' => 'string',
            'regex' => '^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([12]\d{3})$',
            'required' => true,
            'info' => 'Data final das informações contidas no arquivo.',
            'format' => '',
            'length' => 8
        ],
        'COGIGO_MAGNETICO' => [
            'type' => 'numeric',
            'regex' => '^(\d{1})$',
            'required' => false,
            'info' => 'Código da identificação da estrutura do arquivo magnético entregue',
            'format' => '',
            'length' => 1
        ],
        'COGIGO_NATUREZAS' => [
            'type' => 'numeric',
            'regex' => '^(\d{1})$',
            'required' => false,
            'info' => 'Código da identificação da natureza das operações informadas',
            'format' => '',
            'length' => 1
        ],
        'COGIGO_FINALIDADE' => [
            'type' => 'numeric',
            'regex' => '^(\d{1})$',
            'required' => false,
            'info' => 'Código da finalidade do arquivo magnético',
            'format' => '',
            'length' => 1
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
