<?php 

$arr = [];
$resArr=[];
$arrSize = 8;

$anFn = function (int $num): string {
    return ($num % 2) ? "$num - нечётное" : "$num - чётное";
};

$anFn2 = fn($num) => ($num & 1) ? "$num - нечётное" : "$num - чётное";

function randArr(int $arrSize = 5): array 
{
    $result = [];
    for ($i = 0; $i < $arrSize; $i++)
    {
        $result[] = rand(0,100);
    }
    return $result;
}

$arr = randArr();
$resArr = array_map($anFn, $arr);
$resArr2 = array_map($anFn2, $arr);

print_r($resArr);
print_r($resArr2);