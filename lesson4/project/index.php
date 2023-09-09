<?php

function fun($n)
{
    --$n;
   if ($n > 0) fun($n);
echo $n . "=";
echo $n & 1;
echo PHP_EOL;
}
$b = 8;
// fun($b);

$a = array_fill(0, 10, array_fill(0, 10, 1));
print_r($a);