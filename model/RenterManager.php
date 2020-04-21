<?php

namespace Combis\Model;

require_once("model/Manager.php");

class RenterManager extends Manager {
    public function getRandRenter() {
        $bdd = $this->bddConnect();
        $query = $bdd->prepare('
        SELECT * FROM renters
        JOIN address ON renters.address_id = address.id
        ORDER BY RAND () LIMIT 1
        ');
        $query->execute();
        $renter = $query->fetch();
        $query->closeCursor();
        return $renter;
    }

    public function getRenter($renterId) {
        $bdd = $this->bddConnect();
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

    public function getRenters() {
        $bdd = $this->bddConnect();
        $query = $bdd->prepare('
        SELECT renters.id, address, zipcode, city, name, website, phone, picture, description FROM renters
        JOIN address ON renters.address_id = address.id
        ');
        $query->execute();
        $renters = $query->fetchAll(\PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $renters;
    }

    public function getRenterModels($renterId) {
        $bdd = $this->bddConnect();
        $query = $bdd->prepare('
        SELECT model, nickname, name FROM renters_models
        JOIN models ON renters_models.model_id=models.id
        JOIN versions ON models.version_id=versions.id
        WHERE renter_id = ?
        ORDER BY model
        ');
        $query->execute([$renterId]);
        $renterModels = $query->fetchAll(\PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $renterModels;
    }
}