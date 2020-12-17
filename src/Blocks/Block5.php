<?php

namespace NFePHP\Sintegra\Blocks;

use NFePHP\Sintegra\Elements;
use NFePHP\Sintegra\Common\Block;
use NFePHP\Sintegra\Common\BlockInterface;

/**
 * Classe constutora do bloco 010 (inicial) Sintegra
 *
 * Esta classe irá usar um recurso para invocar as classes de cada um dos elementos
 * constituintes listados.
 */
final class Block1 extends Block implements BlockInterface
{
    public $elements = [
        'z50' => ['class' => Elements\Z50::class, 'level' => 0, 'type' => 'single'],
        'z51' => ['class' => Elements\Z51::class, 'level' => 0, 'type' => 'single'],
        'z53' => ['class' => Elements\Z53::class, 'level' => 0, 'type' => 'single'],
        'z54' => ['class' => Elements\Z54::class, 'level' => 0, 'type' => 'single'],
        'z55' => ['class' => Elements\Z55::class, 'level' => 0, 'type' => 'single'],
        'z56' => ['class' => Elements\Z56::class, 'level' => 0, 'type' => 'single'],
    ];
}
