<?php

namespace Combis\Controller;

use \Combis\Model\RenterManager;

require_once('model/RenterManager.php');

class RenterController
{
    public function renter()
    {
        $renterManager = new RenterManager();
        $renter = $renterManager->getRenter($_GET['id']);
        $renterModels = $renterManager->getRenterModels($_GET['id']);
        require('view/frontend/renterView.php');
    }

    public function renters()
    {
        $renterManager = new RenterManager();
        $renters = $renterManager->getRenters();
        require('view/frontend/rentersView.php');
    }
}
