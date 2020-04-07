<?php
    require_once ("config.php");
    try{
        $bdd = new PDO ('mysql:host='.$host.';dbname='.$dbName, $userBdd, $passBdd, $optionBdd);
    
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
        $bdd = null;
    } catch (PDOException $e) {
        echo 'Erreur: '.$e->getMessage().'<br/';
        die();
    }