<?php

$configname = 'config.json';
$config = file_get_contents($configname);

if($config === false){
    echo("Ошибка при чтении конфига");
} else{
    $dbcon = json_decode($config, true);
    if(json_last_error() === JSON_ERROR_NONE){
        $host = $dbcon['host'];
        $dbname = $dbcon['dbname'];
        $user = $dbcon['user'];
        $password = $dbcon['password'];
    }else{
        echo("Ошибка при чтении JSON-".json_last_error_msg());
    }
}

$db = new PDO("mysql:host=$host;dbname=$dbname","$user",$password);

session_start();
// print_r($dbcon);