<?php

$input = file_get_contents('input');
$arr   = explode(PHP_EOL, $input);
$sum   = 0;

foreach($arr as $mass) {
    $fuel = floor($mass / 3 ) - 2;
    $sum += $fuel;

    while ($fuel > 0) {
        $fuel = floor($fuel / 3) - 2;
        if ($fuel > 0) {
            $sum += $fuel;
        }
    }
}

echo $sum . PHP_EOL;


