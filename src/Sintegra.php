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

namespace NFePHP\Sintegra;

use NFePHP\Sintegra\Blocks\Block1;
use NFePHP\Sintegra\Blocks\Block5;
use NFePHP\Sintegra\Blocks\Block6;
use NFePHP\Sintegra\Blocks\Block7;
use NFePHP\Sintegra\Blocks\Block8;
use NFePHP\Sintegra\Common\BaseSintegra;

/**
 * Classe construtora do arquivo SINTEGRA
 *
 * Esta classe recebe as classes listadas com o metodo add() e
 * executa o processo de construção final do arquivo
 */
final class Sintegra extends BaseSintegra
{
    /**
     * @var array
     */
    protected $possibles = [
        'block1' => ['class' => Block1::class, 'order' => 1],
        'block5' => ['class' => Block5::class, 'order' => 2],
        'block6' => ['class' => Block6::class, 'order' => 3],
        'block7' => ['class' => Block7::class, 'order' => 4],
        'block8' => ['class' => Block8::class, 'order' => 5],
    ];
}
