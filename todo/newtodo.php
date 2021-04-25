<?php

// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";

$todoname = $_POST['todo'] ?? '';
$todoname = trim($todoname);

if ($todoname) {
    $json = file_get_contents('todo.json');
    $jsonArray = json_decode($json, true);
    file_put_contents('todo.json', true);
}
