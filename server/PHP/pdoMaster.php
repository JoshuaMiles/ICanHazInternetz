<?php

function getPDO()
{
    $db_name = 'hotspots';
    $db_username = 'root';
    $db_password = '';
    $db_host = "127.0.0.1:3306";
    try {
        $pdo = new PDO ("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
    } catch (PDOException $e) {
        echo $e;
        exit();
    }
    return $pdo;
}


