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
use NFePHP\Sintegra\Common\BlockInterface;
use NFePHP\Sintegra\Elements;

/**
 * Classe constutora do bloco 7 Sintegra
 *  Nota fiscal de serviço de transporte e Informações da carga transportada
 *  Registro de inventário
 *  Código de produtos ou serviços
 *  Nota fiscal de serviços de comunicação e telecomunicações e Serviços de comunicação e telecomunicação
 *
 * Esta classe irá usar um recurso para invocar as classes de cada um dos elementos
 * constituintes listados.
 */
final class Block7 extends Block implements BlockInterface
{
    /**
     * @var array
     */
    public $elements = [
        'z70' => ['class' => Elements\Z70::class, 'level' => 0, 'type' => 'single'],
        'z71' => ['class' => Elements\Z71::class, 'level' => 0, 'type' => 'single'],
        'z74' => ['class' => Elements\Z74::class, 'level' => 0, 'type' => 'single'],
        'z75' => ['class' => Elements\Z75::class, 'level' => 0, 'type' => 'single'],
        'z76' => ['class' => Elements\Z76::class, 'level' => 0, 'type' => 'single'],
        'z77' => ['class' => Elements\Z77::class, 'level' => 0, 'type' => 'single'],
    ];
}
