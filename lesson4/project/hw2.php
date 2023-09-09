<?php

require "hw1.php";

$arr = randArr();

function arrAnalisys(array $arr): array 
{
    return [
        'max' => max($arr),
        'min' => min($arr),
        'avg' => array_sum($arr) / count($arr)
    ];
}

print_r($arr);
print_r(arrAnalisys($arr));