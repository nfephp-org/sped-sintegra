<?php

namespace NFePHP\Sintegra;

use NFePHP\Sintegra\Common\BlockInterface;
use NFePHP\Sintegra\SintegraEnum;

abstract class Sintegra
{
    protected $possibles = [];

    public function __construct()
    {
        //todo
    }

    /**
     * Add
     * @param BlockInterface $block
     */
    public function add(BlockInterface $block = null)
    {
        if (empty($block)) {
            return;
        }
        $name = strtolower((new \ReflectionClass($block))->getShortName());
        if (key_exists($name, $this->possibles)) {
            $this->{$name} = $block->get();
        }
    }

    /**
     * Create a SINTEGRA string
     */
    public function get()
    {
        $sintegra = '';
        $keys = array_keys($this->possibles);
        foreach ($keys as $key) {
            if (isset($this->$key)) {
                $sintegra .= $this->$key;
            }
        }
        $sintegra .= $this->totalize($sintegra);
        return $sintegra;
    }

    /**
     * Totals blocks contents
     * @param string $sintegra
     * @return string
     */
    protected function totalize($sintegra)
    {
        $sintegraArray = explode("\n", $sintegra);
        $numeroTotalRegistros = count($sintegraArray);
        $numeroTotalRegistros += 1;
        $numeroTotalRegistros = str_pad($numeroTotalRegistros, 8, "0", STR_PAD_LEFT);
        $numeroTotalRegistros = str_pad($numeroTotalRegistros, 53, " ", STR_PAD_RIGHT);
        $totalRegistros90 = '2';

        $cnpj = substr($sintegraArray[0], 2, 14);
        $cnpj = str_pad($cnpj, 14, " ", STR_PAD_RIGHT);
        $ie = substr($sintegraArray[0], 16, 14);
        $ie = str_pad($ie, 14, " ", STR_PAD_RIGHT);

        $keys = [];
        $totalizador = '';
        $somatorioPorBloco = [
            SintegraEnum::REGISTRO_10 => 0,
            SintegraEnum::REGISTRO_11 => 0,
            SintegraEnum::REGISTRO_50 => 0,
            SintegraEnum::REGISTRO_51 => 0,
            SintegraEnum::REGISTRO_53 => 0,
            SintegraEnum::REGISTRO_54 => 0,
            SintegraEnum::REGISTRO_55 => 0,
            SintegraEnum::REGISTRO_56 => 0,
            SintegraEnum::REGISTRO_60 => 0,
            SintegraEnum::REGISTRO_61 => 0,
            SintegraEnum::REGISTRO_70 => 0,
            SintegraEnum::REGISTRO_71 => 0,
            SintegraEnum::REGISTRO_74 => 0,
            SintegraEnum::REGISTRO_75 => 0,
            SintegraEnum::REGISTRO_76 => 0,
            SintegraEnum::REGISTRO_77 => 0,
            SintegraEnum::REGISTRO_85 => 0,
            SintegraEnum::REGISTRO_86 => 0,
        ];

        foreach ($sintegraArray as $element) {
            $numeroBloco = substr($element, 0, 2);

            if (!empty($numeroBloco)) {
                if (!isset($keys[$numeroBloco])) {
                    $somatorioPorBloco[$numeroBloco] += 1;
                    continue;
                }
                $somatorioPorBloco[$numeroBloco] = 1;
            }
        }

        $inicioLinha = SintegraEnum::REGISTRO_90 . $cnpj . $ie;
        $totalizador .= $inicioLinha;

        foreach ($somatorioPorBloco as $key => $value) {
            if ($key != SintegraEnum::REGISTRO_10 && $key != SintegraEnum::REGISTRO_11) {
                $segundaLinha = $key == SintegraEnum::REGISTRO_75;
                if ($segundaLinha) {
                    $totalizador .= str_pad($totalRegistros90, 6, " ", STR_PAD_LEFT)."\n";
                    $totalizador .= $inicioLinha;
                }
                $totalizador .= $key . str_pad($value, 8, "0", STR_PAD_LEFT);
            }
        }
        return $totalizador .= SintegraEnum::TOTALIZADOR_99 . $numeroTotalRegistros . $totalRegistros90;
    }
}
