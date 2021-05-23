<?php

namespace NFePHP\Sintegra\Common;

abstract class BaseSintegra
{
    protected $possibles = [];

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
        $sintegraArray = explode("\r\n", $sintegra);
        $inicioLinha = $this->getInicioLinha($sintegraArray[0]);
        $somatorioPorBloco = $this->getSomatorioPorBloco($sintegraArray);
        $totalizadoresLinhas = $this->getTotalizadoresRegistro90($somatorioPorBloco, $inicioLinha);
        $registro90 = '';
        $totalLinhasRegistro = count($totalizadoresLinhas);
        foreach ($totalizadoresLinhas as $linha) {
            $complementoLinha = str_pad($totalLinhasRegistro, (126 - strlen($linha)), " ", STR_PAD_LEFT) . "\r\n";
            $registro90 .= $linha . $complementoLinha;
        }
        return $registro90;
    }

    /**
     * Get start of every line of register 90
     * @param string $inicioArquivo
     * @return string
     */
    private function getInicioLinha($inicioArquivo)
    {
        $cnpj = substr($inicioArquivo, 2, 14);
        $cnpj = str_pad($cnpj, 14, " ", STR_PAD_RIGHT);
        $ie = substr($inicioArquivo, 16, 14);
        $ie = str_pad($ie, 14, " ", STR_PAD_RIGHT);
        return Enum::REGISTRO_90 . $cnpj . $ie;
    }

    /**
     * Get array of total lines by block
     * @param array $sintegraArray
     * @return array
     */
    private function getSomatorioPorBloco($sintegraArray)
    {
        $keys = [];
        $somatorioPorBloco = [
            Enum::REGISTRO_10 => 0,
            Enum::REGISTRO_11 => 0,
            Enum::REGISTRO_50 => 0,
            Enum::REGISTRO_51 => 0,
            Enum::REGISTRO_53 => 0,
            Enum::REGISTRO_54 => 0,
            Enum::REGISTRO_55 => 0,
            Enum::REGISTRO_56 => 0,
            Enum::REGISTRO_60 => 0,
            Enum::REGISTRO_61 => 0,
            Enum::REGISTRO_61R => 0,
            Enum::REGISTRO_70 => 0,
            Enum::REGISTRO_71 => 0,
            Enum::REGISTRO_74 => 0,
            Enum::REGISTRO_75 => 0,
            Enum::REGISTRO_76 => 0,
            Enum::REGISTRO_77 => 0,
            Enum::REGISTRO_85 => 0,
            Enum::REGISTRO_86 => 0,
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
        return $somatorioPorBloco;
    }

    /**
     * Get array containing lines of register 90 with the totalizers
     * @param array $somatorioPorBloco
     * @param String $inicioLinha
     * @return array
     */
    private function getTotalizadoresRegistro90($somatorioPorBloco, $inicioLinha)
    {
        $totalGeral = 0;
        $totalizadoresLinhas = [];
        $linha = $inicioLinha;
        foreach ($somatorioPorBloco as $key => $value) {
            $totalGeral += $value;
            if ($key == Enum::REGISTRO_10
                || $key == Enum::REGISTRO_11
                || $value == 0) {
                continue;
            }
            $totalizadorRegistro = $key . str_pad($value, 8, "0", STR_PAD_LEFT);
            if (strlen($linha . $totalizadorRegistro) > 125) {
                $totalizadoresLinhas[] = $linha;
                $linha = $inicioLinha;
            }

            $linha .= $totalizadorRegistro;
        }
        if (strlen($linha) > 115) {
            $totalizadoresLinhas[] = $linha;
            $linha = $inicioLinha;
            $totalGeral += 1;
        }
        $totalGeral += 1;
        $totalizador99 = Enum::TOTALIZADOR_99 . str_pad($totalGeral, 8, "0", STR_PAD_LEFT);
        $linha .= $totalizador99;
        if (strlen($linha) > 0) {
            $totalizadoresLinhas[] = $linha;
        }
        return $totalizadoresLinhas;
    }
}
