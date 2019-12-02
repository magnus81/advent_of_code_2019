<?php

$input = file_get_contents('input');
$init  = explode(',', $input);

$noun = 0;
$verb = 0;

$position = resetMemory($memory, $init, $noun, $verb);

while (true) {
    switch ($memory[$position]) {
        case '1':
            $position = doAdd($memory, $position);
        break;
        case '2':
            $position = doMult($memory, $position);
        break;
        case '99':
            if ($memory[0] == 19690720) {
                echo $memory[0] . PHP_EOL;
                echo (100 * $noun + $verb) . PHP_EOL;
                die('Program exit' . PHP_EOL);
            } else {
                setNounAndVerb($noun, $verb);
                $position = resetMemory($memory, $init, $noun, $verb);
            }
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

function resetMemory(&$memory, &$init, $noun, $verb) {
    $memory = $init;
    $memory[1] = $noun;
    $memory[2] = $verb;
    return 0;
}

function setNounAndVerb(&$noun, &$verb) {
    if ($verb == 99) {
        $noun++;
        $verb = 0;
    } else {
        $verb++;
    }
}
