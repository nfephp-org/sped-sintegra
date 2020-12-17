<?php

namespace NFePHP\Sintegra\Blocks;

use NFePHP\Sintegra\Elements;
use NFePHP\Sintegra\Common\Block;
use NFePHP\Sintegra\Common\BlockInterface;

/**
 * Classe constutora do bloco 8 Sintegra  Informações de exportações 
 *
 * Esta classe irá usar um recurso para invocar as classes de cada um dos elementos
 * constituintes listados.
 */
final class Block1 extends Block implements BlockInterface
{
    public $elements = [
        'z85' => ['class' => Elements\Z85::class, 'level' => 0, 'type' => 'single'],
        'z86' => ['class' => Elements\Z86::class, 'level' => 0, 'type' => 'single'],
    ];
}
