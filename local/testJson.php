<?php

$arr = [
    "mes" => 1,
    "ano" => 2021,
    "registros" => [
        0 => '50',
        1 => '51',
        2 => '53',
        3 => '54',
        4 => '55',
        5 => '56',
        6 => '57',
        7 => '60',
        8 => '60A',
        9 => '60D',
        10 => '60I',
        11 => '60M',
        12 => '60R',
        13 => '61',
        14 => '61R',
        15 => '70',
        16 => '71',
        17 => '74',
        18 => '75',
        19 => '85',
        20 => '86',
    ]
];


$json = json_encode($arr, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $json;

