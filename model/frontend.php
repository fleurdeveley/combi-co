<?php

function bddConnect() {
    require('config.php');
    try{
        $bdd = new PDO ("mysql:host=".$host.";dbname=".$dbName, $userBdd, $passBdd, $optionBdd);
        return $bdd;
    } catch (Exception $e) {
        die('Erreur: '.$e->getMessage());
    }
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
    return $models;
}

function getRandRenter() {
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

function getRenter($renterId) {
    $bdd = bddConnect();
    $query = $bdd->prepare('
    SELECT renters.id, address, zipcode, city, name, website, phone, picture, description FROM renters
    JOIN address ON renters.address_id = address.id
    WHERE renters.id = ?
    ');
    $query->execute([$renterId]);
    $renter = $query->fetch();
    $query->closeCursor();
    return $renter;
}

function getRenters() {
    $bdd = bddConnect();
    $query = $bdd->prepare('
    SELECT renters.id, address, zipcode, city, name, website, phone, picture, description FROM renters
    JOIN address ON renters.address_id = address.id
    ');
    $query->execute();
    $renters = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $renters;
}

function getRenterModels($renterId) {
    $bdd = bddConnect();
    $query = $bdd->prepare('
    SELECT model, nickname, name FROM renters_models
    JOIN models ON renters_models.model_id=models.id
    JOIN versions ON models.version_id=versions.id
    WHERE renter_id = ?
    ORDER BY model
    ');
    $query->execute([$renterId]);
    $renterModels = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $renterModels;
}

function getModelRenters($modelId) {
    $bdd = bddConnect();
    $query = $bdd->prepare('
    SELECT name, website, address, zipcode, city FROM renters_models
    JOIN renters ON renters_models.renter_id = renters.id
    JOIN address ON renters.address_id = address.id
    WHERE model_id = ?
    ');
    $query->execute([$modelId]);
    $modelRenters = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $modelRenters;
}

function getUser() {
    $bdd = bddConnect();
    $query = $bdd->prepare("
    SELECT email FROM user
    WHERE email =" .$_POST['email'] . "AND password =" .$_POST['password']
    );
    $query->execute();
    $user = $query->fetch();
    $query->closeCursor();
    return $user;
}
