<?php

use \Combis\Controller\AdminRenterController;
use \Combis\Controller\RenterController;
use \Combis\Controller\ModelController;
use \Combis\Controller\HomeController;
use \Combis\Controller\LoginController;

require_once('controller/AdminRenterController.php');
require_once('controller/ModelController.php');
require_once('controller/RenterController.php');
require_once('controller/LoginController.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'home') {
        $homeController = new HomeController();
        $homeController->home();   
    } elseif ($_GET['action'] == 'login') {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $loginController = new LoginController();
            $loginController->checkLogin();
        } else {
            $loginController = new LoginController();
            $loginController->login();
        } 
    } elseif ($_GET['action'] == 'models') {
        $modelController = new ModelController();
        $modelController->models();
    } elseif ($_GET['action'] == 'model') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $modelController = new ModelController();
            $modelController->model();
        } else {
            $modelController = new ModelController();
            $modelController->models();
        }
    } elseif ($_GET['action'] == 'renters') {
        $renterController = new RenterController();
        $renterController->renters();
    } elseif ($_GET['action'] == 'renter') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $renterController = new RenterController();
            $renterController->renter();
        } else {
            $renterController = new RenterController();
            $renterController->renters();
        }
    } elseif ($_GET['action'] == 'addrenter') {
        $adminRenterController = new AdminRenterController();
        $adminRenterController->addRenter();
    } elseif($_GET['action'] == 'editrenter') {
        $adminRenterController = new AdminRenterController();
        $adminRenterController->editRenter();  
    } elseif($_GET['action'] == 'listrenters') {
        $adminRenterController = new AdminRenterController();
        $adminRenterController->listRenters();
    } elseif ($_GET['action'] == 'readrenter') {
        if(isset($_GET['id']) && $_GET['id'] > 0) {
            $adminRenterController = new AdminRenterController();
            $adminRenterController->readRenter();
    } else {
        $homeController = new HomeController();
        $homeController->home();  
    }
}else {
    $homeController = new HomeController();
    $homeController->home();  
}
}