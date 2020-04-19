<?php
require_once('model/frontend.php');

function addRenter() {
    $renter = getRenter($_GET['id']);
    require('view/backend/renters/addView.php');
}

function editRenter() {
    $renter = getRenter($_GET['id']);
    require('view/backend/renters/editView.php');
}

function listRenters() {
    $renters = getRenters();
    require('view/backend/renters/listView.php');
}

function readRenter() {
    $renter = getRenter($_GET['id']);
    require('view/backend/renters/readView.php');
}
