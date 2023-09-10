<?php

require "hw1.php";

$arr = randArr();

function arrAnalisys(array $arr): array 
{
    $max = max($arr);
    $min = min($arr);
    $avg = array_sum($arr) / count($arr);
    return [
        'max' => $max,
        'min' => $min,
        'avg' => $avg,
    ];
}

print_r($arr);
print_r(arrAnalisys($arr));