<?php

use \Combis\Model\RenterManager;

require_once('model/RenterManager.php');

function addRenter() {
    $renterManager = new RenterManager();
    $renter = $renterManager->getRenter($_GET['id']);
    require('view/backend/renters/addView.php');
}

function editRenter() {
    $renterManager = new RenterManager();
    $renter = $renterManager->getRenter($_GET['id']);
    require('view/backend/renters/editView.php');
}

function listRenters() {
    $renterManager = new RenterManager();
    $renters = $renterManager->getRenters();
    require('view/backend/renters/listView.php');
}

function readRenter() {
    $renterManager = new RenterManager();
    $renter = $renterManager->getRenter($_GET['id']);
    require('view/backend/renters/readView.php');
}
