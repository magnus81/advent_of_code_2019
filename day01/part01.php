<?php

$input = file_get_contents('input');
$arr   = explode(PHP_EOL, $input);
$sum   = 0;

foreach($arr as $mass) {
    $sum += floor($mass / 3 ) - 2;
}

echo $sum . PHP_EOL;


