<?php

$arr_1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$arr_2 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];


for ($i = 0; $i < count($arr_1); $i++) { 
    print_r("{$arr_1[$i]} * {$arr_2[$i]} = " . 
            (string)($arr_1[$i] * $arr_2[$i]) . "\n");
        }
        

die();
        
Решение:
        
$multiple = [];
for ($i = 0; $i < count($arr_1); $i++) { 
    $multiple[] = $arr_1[$i] * $arr_2[$i];
}
print_r($multiple);