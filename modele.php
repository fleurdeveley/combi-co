<?php
function getRenter() {
    try{
        $bdd = new PDO ('mysql:host=localhost;dbname=combis', 'root', '', [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (Exception $e) {
        die('Erreur: '.$e->getMessage());
    }
    $query = $bdd->prepare('
    SELECT * FROM renter
    JOIN address ON renter.address_id = address.id
    ORDER BY RAND () LIMIT 1
    ');
    $query->execute();
    $renter = $query->fetch();
    // echo'<pre>';
    // print_r($renter);
    // echo'</pre>';

    return $renter;
}

function getModels() {
    try{
        $bdd = new PDO ('mysql:host=localhost;dbname=combis', 'root', '', [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (Exception $e) {
        die('Erreur: '.$e->getMessage());
    }
    $query = $bdd->prepare('
        SELECT * FROM model
        JOIN version ON model.version_id = version.id
        ORDER BY RAND () LIMIT 2
    ');
    $query->execute();
    $models = $query->fetchAll(PDO::FETCH_ASSOC);
    // echo'<pre>';
    // print_r($models);
    // echo'</pre>';
    // $bdd = null;

    return $models;
}
