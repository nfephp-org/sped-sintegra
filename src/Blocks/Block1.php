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

namespace NFePHP\Sintegra\Blocks;

use NFePHP\Sintegra\Common\Block;
use NFePHP\Sintegra\Elements;

/**
 * Classe constutora do bloco 10 (inicial) Sintegra
 * REGISTRO 10 - Mestre do estabelecimento: dados da empresa
 * Registro 11 - Dados complementares do informante: endereço,nome do contato
 *
 * Esta classe irá usar um recurso para invocar as classes de cada um dos elementos
 * constituintes listados.
 */
final class Block1 extends Block
{
    /**
     * @var array
     */
    public $elements = [
        'z10' => ['class' => Elements\Z10::class, 'level' => 0, 'type' => 'single'],
        'z11' => ['class' => Elements\Z11::class, 'level' => 0, 'type' => 'single'],
    ];
}
