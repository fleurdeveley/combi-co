<?php

namespace Combis\Controller;

use \Combis\Model\ModelManager;

require_once('model/ModelManager.php');

class ModelController
{
    public function model()
    {
        $modelManager = new ModelManager();
        $model = $modelManager->getModel($_GET['id']);
        $modelRenters = $modelManager->getModelRenters($_GET['id']);
        require('view/frontend/modelView.php');
    }

    public function models()
    {
        $modelManager = new ModelManager();
        $models = $modelManager->getModels();
        require('view/frontend/modelsView.php');
    }
}
