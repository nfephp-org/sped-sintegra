<?php

namespace NFePHP\Sintegra;

use NFePHP\Sintegra\Sintegra;

/**
 * Classe construtora do arquivo SINTEGRA
 *
 * Esta classe recebe as classes listadas com o metodo add() e
 * executa o processo de construção final do arquivo
 */
final class SintegraCont extends Sintegra
{
    protected $possibles = [
        'blockSintegra' => ['class' => Blocks\Sintegra\BlockSintegra::class, 'order' => 1],
    ];
}
