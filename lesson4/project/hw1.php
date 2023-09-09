<?php 

$arr = [];
$resArr=[];
$arrSize = 8;

$anFn = function (int $num): string {
    return $num % 2 ? "$num - нечётное" : "$num - чётное";
};

for ($i = 0; $i < $arrSize; $i++)
{
    $arr[] = rand(0,100);
}

$resArr = array_map($anFn, $arr);

print_r($resArr);