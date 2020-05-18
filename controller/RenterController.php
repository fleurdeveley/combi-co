<?php

namespace Combis\Controller;

use \Combis\Model\RenterManager;
use \Combis\Api\Meteo;

require_once('model/RenterManager.php');
require_once('api/Meteo.php');

class RenterController
{
    public function renter()
    {
        $renterManager = new RenterManager();
        $renter = $renterManager->getRenter($_GET['id']);
        $renterModels = $renterManager->getRenterModels($_GET['id']);
        $api = new Meteo();
        $forecasts = $api->meteo($renter['zipcode'], $renter['city']);
        $forecasts = array_slice($forecasts, 0, 7);
        require('view/frontend/renterView.php');
    }

    public function renters()
    {
        $renterManager = new RenterManager();
        $renters = $renterManager->getRenters();
        require('view/frontend/rentersView.php');
    }
}
