<?php

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
    protected $possibles = [
        'block1' => ['class' => Block1::class, 'order' => 1],
        'block5' => ['class' => Block5::class, 'order' => 2],
        'block6' => ['class' => Block6::class, 'order' => 3],
        'block7' => ['class' => Block7::class, 'order' => 4],
        'block8' => ['class' => Block8::class, 'order' => 5],
    ];
}
