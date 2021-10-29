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

use NFePHP\Common\Strings;
use stdClass;
use Brazanation\Documents;

abstract class Element implements ElementInterface
{
    /**
     * @var \stdClass
     */
    public $std;
    /**
     * @var \stdClass
     */
    public $values;
    /**
     * @var array
     */
    public $errors = [];
    /**
     * @var array
     */
    protected $parameters;
    /**
     * @var string
     */
    protected $reg;
    /**
     *
     * @var string
     */
    private $strchar = ' ';
    /**
     * @var int
     */
    protected $len = 126;
    /**
     * @var string|null
     */
    protected $subtipo = null;

    /**
     * Constructor
     *
     * @param string $reg
     * @param int $len
     */
    public function __construct($reg, $len = 126)
    {
        $this->reg = $reg;
        $this->len = $len;
        $this->values = new stdClass();
    }

    /**
     * Post validation
     *
     * @return void
     */
    public function postValidation()
    {
    }

    /**
     * Valida e ajusta os dados de entrada para os padões estabelecidos
     *
     * @param \stdClass $std
     *
     * @return \stdClass
     */
    protected function standarize(\stdClass $std)
    {
        if (empty($this->parameters)) {
            throw new \Exception('Parametros não estabelecidos na classe');
        }
        //passa todos as variáveis do stdClass para minusculo
        $arr = array_change_key_case(get_object_vars($std), CASE_LOWER);
        $std = json_decode(json_encode($arr));
        //paga as chaves dos parametros e passa para minusculo
        $stdParam = json_decode(json_encode($this->parameters));
        $this->parameters = array_change_key_case(get_object_vars($stdParam), CASE_LOWER);
        $paramKeys = array_keys($this->parameters);
        //passa os paramatros com as chaves modificadas para um stdClass
        if (!$json = json_encode($this->parameters)) {
            throw new \Exception("Falta definir os parametros ou existe erro no array");
        }
        $stdParam = json_decode($json);
        if ($stdParam === null) {
            throw new \Exception("Houve uma falha na conversão para stdClass");
        }
        // init defautls params
        foreach ($stdParam as $key => $param) {
            if (!isset($std->$key)) {
                $std->$key = '';
            }
        }
        $newstd = new \stdClass();
        foreach ($paramKeys as $key) {
            //se o valor para o parametro foi passado, então validar
            $resp = $this->isFieldInError(
                $std->$key,
                $stdParam->$key,
                strtoupper($key),
                $this->reg,
                $stdParam->$key->required
            );
            if ($resp) {
                $this->errors[] = (object) [
                    'message' => $resp,
                    'std' => $std
                ];
            }
            //e formatar o dado passado
            $formated = $this->formater(
                $std->$key,
                $stdParam->$key->length,
                strtoupper($key),
                $stdParam->$key->format
            );
            //formata o comprimento das strings
            $newValue = $this->formatString(
                $formated,
                $stdParam->$key,
                $stdParam->$key->type
            );
            $newstd->$key = $newValue;
        }
        return $newstd;
    }

    /**
     * Verifica os campos com-relação ao tipo e seu regex
     *
     * @param string|integer|float|null $input
     * @param stdClass $param
     * @param string $fieldname
     * @param string $element
     * @param bool $required
     *
     * @return string|void
     */
    protected function isFieldInError($input, $param, $fieldname, $element, $required)
    {
        $type = $param->type;
        $regex = $param->regex;

        if (empty($input) && $required) {
            // Não retornar erro se o campo for numerico e foi inserido o valor 0
            if ($type === 'numeric' && is_numeric($input)) {
                return;
            }
            return "[$this->reg] campo: $fieldname é requerido.";
        }
        if ($input === '' && !$required) {
            return;
        }
        if (empty($regex)) {
            return;
        }
        switch ($type) {
            case 'integer':
                if (!is_numeric($input)) {
                    return "[$this->reg] campo: $fieldname deve ser um valor numérico inteiro.";
                }
                break;
            case 'numeric':
                if (!is_numeric($input)) {
                    return "[$this->reg] campo: $fieldname deve ser um numero.";
                }
                break;
            case 'string':
                if (!is_string($input)) {
                    return "[$this->reg] campo: $fieldname deve ser uma string.";
                }
                break;
        }
        $input = (string)$input;
        if ($regex === 'email') {
            if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
                return "[$this->reg] campo: $fieldname Esse email [$input] está incorreto.";
            }
            return;
        }
        if (!preg_match("/$regex/", $input)) {
            return "[$this->reg] campo: $fieldname valor incorreto [$input]. (validação: $regex) $param->info";
        }
        return;
    }
    
    /**
     * Valida o CNPJ ou CPF passado no campo CNPJ
     *
     * @param string $doc CNPJ/CPF
     * @param string $field nome do campo
     *
     * @return void
     */
    protected function validDoc(string $doc, string $field)
    {
        if ($doc != '0000000000000') {
            if (substr($doc, 0, 3) == '000') {
                $result = Documents\Cpf::createFromString($doc);
            } else {
                $result = Documents\Cnpj::createFromString($doc);
            }
            if ($result === false) {
                $this->errors[] = (object) [
                    'message' => "[$this->reg] campo: {$field} "
                    . "[{$doc}] é INCORRETO ou FALSO.",
                    'std' => $this->std
                ];
            }
        }
    }

    /**
     * Formata os campos float
     *
     * @param string|integer|float|null $value
     * @param int $length
     * @param string $fieldname
     * @param string|null $format
     *
     * @return int|string|float|null
     */
    protected function formater(
        $value,
        $length,
        $fieldname = '',
        $format = null
    ) {
        if ($value === null) {
            $value = '';
        }
        if (!is_numeric($value)) {
            //se não é numerico então passa para ASCII
            $value = Strings::toASCII($value);
        }
        if (empty($format)) {
            return $value;
        }
        //gravar os valores numericos para possivel posterior validação complexa
        $name = strtolower($fieldname);
        if ($value === '' && $format !== 'empty') {
            $value = 0;
        }
        if ($format == 'totalNumber') {
            return $this->numberTotalFormat(floatval($value), $length);
        } elseif ($format == 'aliquota') {
            return $this->numberFormatAliquota($value, $length);
        } elseif ($format == 'empty') {
            return $this->formatFieldEmpty($value, $length);
        }
        $this->values->$name = (float) $value;
        return $this->numberFormat(floatval($value), $format, $fieldname);
    }

    /**
     * Format number
     *
     * @param float $value
     * @param string $format
     * @param string $fieldname
     *
     * @return string
     */
    private function numberFormat($value, $format, $fieldname)
    {
        $n = explode('v', $format);
        $mdec = strpos($n[1], '-');
        $p = explode('.', "{$value}");
        $ndec = !empty($p[1]) ? strlen($p[1]) : 0; //decimal digits
        $nint = strlen($p[0]); //integer digits
        $intdig = (int) $n[0];
        if ($nint > $intdig) {
            $this->errors[] = (object) [
                'message' => "[$this->reg] campo: $fieldname é maior "
                    . "que o permitido [$format]."
            ];
        }
        if ($mdec !== false) {
            //is multi decimal
            $mm = explode('-', $n[1]);
            $decmin = (int) $mm[0];
            $decmax = (int) $mm[1];
            //verificar a quantidade de decimais informada
            //se maior ou igual ao minimo e menor ou igual ao maximo
            if ($ndec >= $decmin && $ndec <= $decmax) {
                //deixa como está
                return number_format($value, $ndec, '', '');
            }
            //se menor que o minimo, formata para o minimo
            if ($ndec < $decmin) {
                return number_format($value, $decmin, '', '');
            }
            //se maior que o maximo, formata para o maximo
            if ($ndec > $decmax) {
                return number_format($value, $decmax, '', '');
            }
        }
        $decplaces = (int) $n[1];
        return number_format($value, $decplaces, '', '');
    }

    /**
     * Format Total numbers
     *
     * @param float $value
     * @param int $length
     *
     * @return string
     */
    private function numberTotalFormat($value, $length)
    {
        $value = (string) $value;
        return str_pad($value, $length, "0", STR_PAD_LEFT);
    }

    /**
     * Format aliquotas
     *
     * @param float $value
     * @param int $length
     *
     * @return string
     */
    private function numberFormatAliquota($value, $length)
    {
        $value = (string) $value;
        $value = str_pad($value, 4, "0", STR_PAD_RIGHT);
        return str_pad($value, $length, "0", STR_PAD_LEFT);
    }

    /**
     * Format empty fields
     *
     * @param string $value
     * @param int $length
     *
     * @return string
     */
    private function formatFieldEmpty($value, $length)
    {
        return str_pad($value, $length, $this->strchar, STR_PAD_RIGHT);
    }

    /**
     * Retorna string conforme o tamanho, pois sintegra considera as posições
     *
     * @param string $value
     * @param stdClass $param
     * @param string $type
     *
     * @return string
     */
    protected function formatString($value, $param, $type)
    {
        $pad = STR_PAD_LEFT;
        $strchar = '0';
        if ($type == 'string') {
            $pad = STR_PAD_RIGHT;
            $strchar = ' ';
        }
        $length = $param->length;
        $newValue = strtoupper(str_pad($value, $length, $strchar, $pad));
        return $newValue;
    }

    /**
     * Construtor do elemento
     *
     * @return string
     */
    protected function build()
    {
        $register = '';
        foreach ($this->parameters as $key => $params) {
            $register .= $this->std->$key;
        }
        $len = $this->len;
        $lenreg = strlen($register) + strlen($this->subtipo) + strlen($this->reg);
        if ($lenreg != $len) {
            $this->errors[] = (object) [
                'message' => "[$this->reg] Erro na construção do elemento esperado {$len} encontrado {$lenreg}."
            ];
        }
        return $register;
    }

    /**
     * Retorna o elemento formatado em uma string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->reg . $this->subtipo . $this->build();
    }
}
