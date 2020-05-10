<?php

use \Combis\Controller\AdminRenterController;
use \Combis\Controller\HomeController;
use \Combis\Controller\LoginController;
use \Combis\Controller\ModelController;
use \Combis\Controller\RenterController;
use \Combis\Controller\NewsletterController;

require_once('controller/AdminRenterController.php');
require_once('controller/HomeController.php');
require_once('controller/LoginController.php');
require_once('controller/ModelController.php');
require_once('controller/RenterController.php');
require_once('controller/NewsletterController.php');

if (isset($_GET['action'])) {
    switch ($_GET['action']){
        case 'home' :
            $homeController = new HomeController();
            $homeController->home();
        break;

        case 'login' :
            if (!empty($_POST['email']) && !empty($_POST['password'])) {
                $loginController = new LoginController();
                $loginController->checkLogin();
            } else {
                $loginController = new LoginController();
                $loginController->login();
            }
        break;

        case 'newsletter' :
            if (!empty($_POST['email'])) {
                $newsletterController = new NewsletterController();
                $newsletterController->newsletter();
            } 
        break;

        case 'deconnexion' :
            $loginController = new LoginController();
            $loginController->deconnexion();
        break;

        case 'models' :
            $modelController = new ModelController();
            $modelController->models();
        break;

        case 'model' :
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $modelController = new ModelController();
                $modelController->model();
            } else {
                $modelController = new ModelController();
                $modelController->models();
            }
        break;

        case 'renters' :
            $renterController = new RenterController();
            $renterController->renters();
        break;

        case 'renter' :
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $renterController = new RenterController();
                $renterController->renter();
            } else {
                $renterController = new RenterController();
                $renterController->renters();
            }
        break;

        case 'addrenter' :
            if (isset($_POST) && !empty($_POST)){
                $adminRenterController = new AdminRenterController();
                $adminRenterController->insertRenter();
            } else {
                $adminRenterController = new AdminRenterController();
                $adminRenterController->addRenter();
            }
        break;  

        case 'editrenter' :
            if (isset($_POST) && !empty($_POST)){
                $adminRenterController = new AdminRenterController();
                $adminRenterController->updateRenter();
            } else {
                $adminRenterController = new AdminRenterController();
                $adminRenterController->editRenter();            }
        break;

        case 'listrenters' :
            $adminRenterController = new AdminRenterController();
            $adminRenterController->listRenters();  
        break;

        case 'deleterenter' :
            if (isset($_GET['id']) && $_GET['id'] > 0){
                $adminRenterController = new AdminRenterController();
                $adminRenterController->deleteRenter();
            } else {
                $adminRenterController = new AdminRenterController();
                $adminRenterController->listRenters();
            }
        break;

        case 'readrenter' :
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $adminRenterController = new AdminRenterController();
                $adminRenterController->readRenter();
            } else {
                $adminRenterController = new AdminRenterController();
                $adminRenterController->listRenters();
            }
        break;

        default :
            $homeController = new HomeController();
            $homeController->home();
    }

} else {
    $homeController = new HomeController();
    $homeController->home();
}