<?php
require_once('model/frontend.php');

function addRenter() {
    require('view/backend/renters/addView.php');
}

function deleteRenter() {
    $renters = getRenters();
}

function editRenter() {
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
