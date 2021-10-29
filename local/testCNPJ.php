<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use Brazanation\Documents;

$document = Documents\Cnpj::createFromString('99999090910271');

if (false === $document) {
   echo "Not Valid";
} else {
    echo "OK";
}
