<?php

namespace NFePHP\Sintegra;

use NFePHP\Sintegra\Sintegra;
use Blocks\Sintegra\Block010;
use Blocks\Sintegra\Block011;

/**
 * Classe construtora do arquivo SINTEGRA
 *
 * Esta classe recebe as classes listadas com o metodo add() e
 * executa o processo de construção final do arquivo
 */
final class SintegraCont extends Sintegra
{
    protected $possibles = [
        'block010' => ['class' => Block010::class, 'order' => 1],
        'block011' => ['class' => Block011::class, 'order' => 2],
    ];
}
