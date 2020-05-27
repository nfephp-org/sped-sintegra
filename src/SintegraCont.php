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
        'block010' => ['class' => Blocks\Sintegra\Block010::class, 'order' => 1],
<<<<<<< HEAD
        'block011' => ['class' => Blocks\Sintegra\Block011::class, 'order' => 2],
=======
>>>>>>> 1e3ca1f25aa016e911d27a8f9df7360133484ff5
    ];
}