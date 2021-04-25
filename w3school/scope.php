<?php
/* There are three types of Variable scope in PHP
1. local Scope
2. global scope
3. static scope

 */

$x = 5; //global scope
function test()
{
    echo "<p>variable x inside function is: $x</p>";
}
