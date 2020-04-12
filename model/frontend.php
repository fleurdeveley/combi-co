<?php
function getRenter() {
    $bdd = bddConnect();
    $query = $bdd->prepare('
    SELECT * FROM renters
    JOIN address ON renters.address_id = address.id
    ORDER BY RAND () LIMIT 1
    ');
    $query->execute();
    $renter = $query->fetch();
    $query->closeCursor();
    // echo'<pre>';
    // print_r($renter);
    // echo'</pre>';
    return $renter;
}

function getRenters() {
    $bdd = bddConnect();
    $query = $bdd->prepare('
    SELECT * FROM renters
    JOIN address ON renters.address_id = address.id
    ');
    $query->execute();
    $renters = $query->fetch();
    $query->closeCursor();
    // echo'<pre>';
    // print_r($renter);
    // echo'</pre>';
    return $renters;
}

function getModels() {
    $bdd = bddConnect();
    $query = $bdd->prepare('
        SELECT * FROM models
        JOIN versions ON models.version_id = versions.id
        ORDER BY RAND () LIMIT 2
    ');
    $query->execute();
    $models = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    // echo'<pre>';
    // print_r($models);
    // echo'</pre>';
    // $bdd = null;
    return $models;
}

function bddConnect() {
    try{
        $bdd = new PDO ('mysql:host=localhost;dbname=combis', 'root', '', [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        return $bdd;
    } catch (Exception $e) {
        die('Erreur: '.$e->getMessage());
    }
}
