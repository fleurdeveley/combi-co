<?php

namespace Combis\Controller;

use \Combis\Model\ModelManager;
use \Combis\Model\RenterManager;

require_once('model/ModelManager.php');
require_once('model/RenterManager.php');

class HomeController
{
    function home()
    {
        $renterManager = new RenterManager();
        $renter = $renterManager->getRandRenter();
        $modelManager = new ModelManager();
        $models = $modelManager->getModels();
        shuffle($models);
        $models = array_slice($models, 0, 2);
        require('view/frontend/indexView.php');
    }
}
