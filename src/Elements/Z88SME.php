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
 * Estado de MG
 *
 * REGISTRO '88SME' - Informação sobre mês sem movimento de entradas
 *
 * @see http://www.fazenda.mg.gov.br/empresas/legislacao_tributaria/ricms_2002_seco/anexovii2002_6.html
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z88SME extends Element implements ElementInterface
{
    const REGISTRO = '88';
    protected $subtipo = 'SME';
    
    protected $parameters = [
        'CNPJ' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{11,14}$',
            'required' => true,
            'info' => 'CNPJ ou CPF do Informante',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'MENSAGEM' => [
            'type' => 'string',
            'regex' => '',
            'required' => true,
            'info' => 'Sem Movimento de Entradas',
            'format' => '',
            'length' => 34
        ],
        'BRANCOS' => [
            'type' => 'string',
            'regex' => '',
            'required' => false,
            'info' => 'Brancos',
            'format' => 'empty',
            'length' => 73
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
        $this->validDoc($this->std->cnpj, 'CNPJ');
    }
}
