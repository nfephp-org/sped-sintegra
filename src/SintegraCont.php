<?php

namespace NFePHP\Sintegra;

use NFePHP\Sintegra\Sintegra;
use Blocks\Sintegra\Block1;
use Blocks\Sintegra\Block5;

/**
 * Classe construtora do arquivo SINTEGRA
 *
 * Esta classe recebe as classes listadas com o metodo add() e
 * executa o processo de construção final do arquivo
 */
final class SintegraCont extends Sintegra
{
    protected $possibles = [
        'block1' => ['class' => Block1::class, 'order' => 1],
        'block5' => ['class' => Block5::class, 'order' => 2],
    ];
}
