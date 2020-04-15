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
        SELECT models.id, model, nickname, year_start, year_end, description, picture, name FROM models
        LEFT JOIN versions ON models.version_id = versions.id
        ORDER BY model
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

function getModel($modelId) {
    $bdd = bddConnect();
    $query = $bdd->prepare('
    SELECT models.id, model, nickname, year_start, year_end, description, picture, name FROM models
    LEFT JOIN versions ON models.version_id = versions.id
    WHERE models.id = ?
    ');
    $query->execute([$modelId]);
    $model = $query->fetch();
    $query->closeCursor();
    return $model;
}

function getUser() {
    $bdd = bddConnect();
    $query = $bdd->prepare("
    SELECT email FROM user
    WHERE email =" .$_POST['email'] "AND password =" .$_POST['password']
    );
    $query->execute();
    $user = $query->fetch();
    $query->closeCursor();
    return $user;
}

function bddConnect() {
    require('config.php');
    try{
        $bdd = new PDO ("mysql:host=".$host.";dbname=".$dbName, $userBdd, $passBdd, $optionBdd);
        return $bdd;
    } catch (Exception $e) {
        die('Erreur: '.$e->getMessage());
    }
}
