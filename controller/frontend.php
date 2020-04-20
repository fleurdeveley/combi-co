<?php

require_once('model/frontend.php');

function checkLogin() {
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $user = getUser($_POST['email']);
        if($_POST['email'] == $user['email'] && $_POST['password'] == $user['password']) {
            header('Location: index.php?action=listrenters');
            exit;
        }else{
            require('view/frontend/loginView.php');
        }
    }else {
        require('view/frontend/loginView.php');
    }
}

function home() {
    $renter = getRandRenter();
    $models = getModels();
    shuffle($models);
    $models = array_slice($models, 0, 2);
    require('view/frontend/indexView.php');
}

function login() {
    require('view/frontend/loginView.php');
}

function model() {
    $model = getModel($_GET['id']);
    $modelRenters = getModelRenters($_GET['id']);
    require('view/frontend/modelView.php');
}

function models() {
    $models = getModels();
    require('view/frontend/modelsView.php'); 
}

function renter() {
    $renter = getRenter($_GET['id']);
    $renterModels = getRenterModels($_GET['id']);
    require('view/frontend/renterView.php');    
}

function renters() {
    $renters = getRenters();
    require('view/frontend/rentersView.php');    
}
