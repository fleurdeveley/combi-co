<?php
require('model/frontend.php');

function home() {

    $renter = getRenter();
    $models = getModels();

    require('view/frontend/indexView.php');
}

function models() {
    $models = getModels();

    require('view/frontend/modelsView.php');    
}

function renters() {
    $renters = getRenters();

    require('view/frontend/rentersView.php');    
}

?>