<?php

//magic constant in PHP
echo __DIR__ . "<br>";

echo __FILE__ . "<br>";
// creating folder
mkdir('test');

//rename directory
rename('test', 'hello');

//Delete directory
rmdir('hello');

//read file inside a folder
$file = scandir('../../');
echo "<pre>";
var_dump($file);
echo "</pre>";

//file_get_content and file_put_content
$content = file_get_contents('uploadf.php');
echo $content . "<br>";

mkdir('myfolder');
file_put_contents('hello.txt', 'How are you doing');
