<?php

$input  = file_get_contents('input');
$memory = explode(',', $input);

$position = 0;

$memory[1] = 12;
$memory[2] = 2;

while (true) {
    switch ($memory[$position]) {
        case '1':
            $position = doAdd($memory, $position);
        break;
        case '2':
            $position = doMult($memory, $position);
        break;
        case '99':
            echo $memory[0] . PHP_EOL;
            die('Program exit' . PHP_EOL);
        break;
        default:
            die('Faulty operator ' . $memory[$position] . ' at postition ' . $position);
    }
}

function doAdd(&$memory, $position) {
    $memory[$memory[$position + 3]] = $memory[$memory[$position + 1]] + $memory[$memory[$position + 2]];
    return $position + 4;
}

function doMult(&$memory, $position) {
    $memory[$memory[$position + 3]] = $memory[$memory[$position + 1]] * $memory[$memory[$position + 2]];
    return $position + 4;
}
