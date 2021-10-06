<?php

namespace NFePHP\Sintegra\Blocks;

use NFePHP\Sintegra\Common\Block;
use NFePHP\Sintegra\Common\BlockInterface;
use NFePHP\Sintegra\Elements;

/**
 * Classe constutora do bloco 8 Sintegra  Informações de exportações
 *
 * Esta classe irá usar um recurso para invocar as classes de cada um dos elementos
 * constituintes listados.
 */
final class Block8 extends Block implements BlockInterface
{
    public $elements = [
        'z85' => ['class' => Elements\Z85::class, 'level' => 0, 'type' => 'single'],
        'z86' => ['class' => Elements\Z86::class, 'level' => 0, 'type' => 'single'],

        'z88DV' => ['class' => Elements\Z88DV::class, 'level' => 0, 'type' => 'single'],
        'z88EAN' => ['class' => Elements\Z88EAN::class, 'level' => 0, 'type' => 'single'],
        'z88SME' => ['class' => Elements\Z88SME::class, 'level' => 0, 'type' => 'single'],
        'z88SMS' => ['class' => Elements\Z88SMS::class, 'level' => 0, 'type' => 'single'],
        'z88STES' => ['class' => Elements\Z88STES::class, 'level' => 0, 'type' => 'single'],
        'z88STITNF' => ['class' => Elements\Z88STITNF::class, 'level' => 0, 'type' => 'single'],
    ];
}
