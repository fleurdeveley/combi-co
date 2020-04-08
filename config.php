<?php
    $host = "localhost";
    $dbName = "combis";
    $userBdd = "root";
    $passBdd = "";
    $optionBdd = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', 
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
