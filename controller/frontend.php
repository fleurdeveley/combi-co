<?php

require_once('model/frontend.php');

function home() {
    $renter = getRandRenter();
    $models = getModels();
    shuffle($models);
    $models = array_slice($models, 0, 2);
    require('view/frontend/indexView.php');
}

function models() {
    $models = getModels();
    require('view/frontend/modelsView.php'); 
}

function model() {
    $model = getModel($_GET['id']);
    require('view/frontend/modelView.php');
}

function renters() {
    $renters = getRenters();
    require('view/frontend/rentersView.php');    
}

function login() {
    require('view/frontend/loginView.php');
}

function checkLogin() {
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo "ok";
    }else {
        echo "entrer un mail valide";
    }
}
