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

namespace NFePHP\Sintegra\Common;

interface ElementInterface
{
    /**
     * Este método será usado para validar dados após a validação inicial
     * é um processo complementar usado em alguns casos especificos
     *
     * @return void
     */
    public function postValidation();
}
