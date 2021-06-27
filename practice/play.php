<?php


function sum(...$nums){
    return array_reduce($nums, fn($carry, $num) => $carry + $num);
}
echo sum(2,3,3);
echo '<br>';

$arr = range(0,20);
foreach ($arr as $a){
    echo $a . '<br>';
}

echo("<br>");

