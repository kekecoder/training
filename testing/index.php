<?php

echo fixnames("abigeal", "samuel",'jumoke');

function fixnames($n1, $n2, $n3){
  $n1 = ucfirst(strtolower($n1));
  $n2 = strtoupper($n2);
  $n3 = ucfirst($n3);
  
  return $n1 .' '. $n2 .' '. $n3;
}
echo "<br>";

if (function_exists("phpversion")) {
  echo("fuction exist");
}else {
  echo("function does not exist");
}
echo "<br>";

echo('Your PHP version is ' . phpversion());
