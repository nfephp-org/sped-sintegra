<?php

namespace NFePHP\Sintegra\Blocks;

use NFePHP\Sintegra\Common\Block;
use NFePHP\Sintegra\Common\BlockInterface;
use NFePHP\Sintegra\Elements;

/**
 * Classe constutora do bloco 6 Sintegra  Exclusivo para empresas emissoras de Cupom Fiscal
 *
 * Esta classe irá usar um recurso para invocar as classes de cada um dos elementos
 * constituintes listados.
 */
final class Block6 extends Block implements BlockInterface
{
    public $elements = [
        'z60' => ['class' => Elements\Z60M::class, 'level' => 0, 'type' => 'single'],
        'z61' => ['class' => Elements\Z61::class, 'level' => 0, 'type' => 'single'],
        'z61R' => ['class' => Elements\Z61R::class, 'level' => 0, 'type' => 'single'],
    ];
}
