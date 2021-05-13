<?php

$server = 'localhost';
$dbname = 'zuri';
$dbpass = 'jerusalem';
$dbuser = 'root';

try {
    $pdo = new PDO("mysql:host=$server;dbname=$dbname",$dbuser,$dbpass);
} catch (PDOException $e) {
    echo 'connection failed: ' . $e->getMessage();
}