<?php

namespace NFePHP\Sintegra\Elements;

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z11 extends Element implements ElementInterface
{
    const REGISTRO = '11';

    protected $parameters = [
        'LOGRADOURO' => [
            'type' => 'string',
            'regex' => '^.{2,34}$',
            'required' => true,
            'info' => 'Endereço do estabelcimento.',
            'format' => '',
            'length' => 34
        ],
        'NUMERO' => [
            'type' => 'string',
            'regex' => '^[0-9]{1,5}$',
            'required' => true,
            'info' => 'Número do endereço.',
            'format' => '',
            'length' => 5
        ],
        'COMPLEMENTO' => [
            'type' => 'string',
            'regex' => '^.{2,22}$',
            'required' => false,
            'info' => 'Complemento do endereço',
            'format' => '',
            'length' => 22
        ],
        'BAIRRO' => [
            'type' => 'string',
            'regex' => '^.{2,15}$',
            'required' => false,
            'info' => 'Bairro do estabelicimento',
            'format' => '',
            'length' => 15
        ],
        'CEP' => [
            'type' => 'string',
            'regex' => '^.{8}$',
            'required' => true,
            'info' => 'CEP do endereço',
            'format' => '',
            'length' => 8
        ],
        'CONTATO' => [
            'type' => 'string',
            'regex' => '^.{1,22}$',
            'required' => true,
            'info' => 'Nome da pessoa responsavel pelo estabelcimento',
            'format' => '',
            'length' => 28
        ],
        'TELEFONE' => [
            'type' => 'string',
            'regex' => '^.{12}$',
            'required' => true,
            'info' => 'Telefone do estabelicimento',
            'format' => '',
            'length' => 12
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
