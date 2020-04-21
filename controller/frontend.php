<?php

use \Combis\Model\ModelManager;
use \Combis\Model\RenterManager;
use \Combis\Model\UserManager;

require_once('model/ModelManager.php');
require_once('model/RenterManager.php');
require_once('model/UserManager.php');

function checkLogin() {
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $userManager = new UserManager();
        $user = $userManager->getUser($_POST['email']);
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
    $renterManager = new RenterManager();
    $renter = $renterManager->getRandRenter();
    $modelManager = new ModelManager();
    $models = $modelManager->getModels();
    shuffle($models);
    $models = array_slice($models, 0, 2);
    require('view/frontend/indexView.php');
}

function login() {
    require('view/frontend/loginView.php');
}

function model() {
    $modelManager = new ModelManager();
    $model = $modelManager->getModel($_GET['id']);
    $modelRenters = $modelManager->getModelRenters($_GET['id']);
    require('view/frontend/modelView.php');
}

function models() {
    $modelManager = new ModelManager();
    $models = $modelManager->getModels();
    require('view/frontend/modelsView.php'); 
}

function renter() {
    $renterManager = new RenterManager();
    $renter = $renterManager->getRenter($_GET['id']);
    $renterModels = $renterManager->getRenterModels($_GET['id']);
    require('view/frontend/renterView.php');    
}

function renters() {
    $renterManager = new RenterManager();
    $renters = $renterManager->getRenters();
    require('view/frontend/rentersView.php');    
}