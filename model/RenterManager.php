<?php

namespace Combis\Model;

require_once("model/Manager.php");

class RenterManager extends Manager
{
    public function getRandRenter()
    {
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

    public function insertRenter()
    {
        $bdd = $this->bddConnect();

        $query = $bdd->prepare('
        INSERT INTO address (address, zipcode, city)
        VALUES (?, ?, ?)
        ');
        $query->execute([$_POST['address'], $_POST['zipcode'], $_POST['city']]);
        $query->closeCursor();

        $query = $bdd->prepare('
        INSERT INTO renters (address_id, name, website, phone, picture, description)
        VALUES (?, ?, ?, ?, ?, ?)
        ');
        $query->execute([$bdd->lastInsertId(), $_POST['name'], $_POST['website'], $_POST['phone'], $_POST['picture'], $_POST['description']]);
        $query->closeCursor();
    }

    public function updateRenter($updateRenterId)
    {
        $bdd = $this->bddConnect();
        $renter = $this->getRenter($updateRenterId);

        $query = $bdd->prepare('
        UPDATE address 
        SET address, zipcode, city
        WHERE address.id = ?
        ');
        $query->execute([$updateRenterId]);
        $query->closeCursor();

        $query = $bdd->prepare('
        UPDATE renters 
        SET address_id, name, website, phone, picture, description
        WHERE renters.id = address.id
        ');
        $query->execute([$updateRenterId]);
        $query->closeCursor();
    }

    public function deleteRenter($deleteRenterId)
    {
        $bdd = $this->bddConnect();
        $renter = $this->getRenter($deleteRenterId);

        $query = $bdd->prepare('
        DELETE FROM renters
        WHERE renters.id = ?
        ');
        $query->execute([$deleteRenterId]);
        $query->closeCursor();

        $query = $bdd->prepare('
        DELETE FROM address 
        WHERE address.id = ?
        ');
        $query->execute([$renter['address_id']]);
        $query->closeCursor();
    }

    public function getRenter($renterId)
    {
        $bdd = $this->bddConnect();
        $query = $bdd->prepare('
        SELECT renters.id, address_id, address, zipcode, city, name, website, phone, picture, description FROM renters
        JOIN address ON renters.address_id = address.id
        WHERE renters.id = ?
        ');
        $query->execute([$renterId]);
        $renter = $query->fetch();
        $query->closeCursor();
        return $renter;
    }

    public function getRenters()
    {
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

    public function getRenterModels($renterId)
    {
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
