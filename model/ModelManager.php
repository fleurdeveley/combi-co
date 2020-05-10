<?php

namespace Combis\Model;

require_once("model/Manager.php");

class ModelManager extends Manager
{
    public function getModel($modelId)
    {
        $bdd = $this->bddConnect();
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

    public function getModels()
    {
        $bdd = $this->bddConnect();
        $query = $bdd->prepare('
            SELECT models.id, model, nickname, year_start, year_end, description, picture, name FROM models
            LEFT JOIN versions ON models.version_id = versions.id
            ORDER BY model
        ');
        $query->execute();
        $models = $query->fetchAll(\PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $models;
    }

    public function getModelRenters($modelId)
    {
        $bdd = $this->bddConnect();
        $query = $bdd->prepare('
        SELECT renters.id, name, website, address, zipcode, city FROM renters_models
        JOIN renters ON renters_models.renter_id = renters.id
        JOIN address ON renters.address_id = address.id
        WHERE model_id = ?
        ');
        $query->execute([$modelId]);
        $modelRenters = $query->fetchAll(\PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $modelRenters;
    }
}
