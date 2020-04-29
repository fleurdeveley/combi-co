<?php

namespace Combis\Controller;

use \Combis\Model\RenterManager;

require_once('model/RenterManager.php');

class AdminRenterController {
    public function insertRenter() {
        if(!empty($_POST['address']) && !empty($_POST['zipcode']) && !empty($_POST['city']) && !empty($_POST['name']) && !empty($_POST['website']) && !empty($_POST['phone']) && !empty($_POST['picture']) && !empty($_POST['description'])){
            if (filter_var($_POST['picture'], FILTER_VALIDATE_URL) && filter_var($_POST['website'], FILTER_VALIDATE_URL) && preg_match("/^0[1-9]\d{8}$/", $_POST['phone']) && preg_match("/^[\d]{5}$/", $_POST['zipcode'])) {
                $renterManager = new RenterManager();
                $renterManager->insertRenter();
                header('Location: index.php?action=listrenters');
                exit;
            } else {
                require('view/backend/renters/addView.php');
            }

        } else {
            require('view/backend/renters/addView.php');
        }
    }

    public function addRenter() {
        require('view/backend/renters/addView.php');
    }

    public function readRenter() {
        $renterManager = new RenterManager();
        $renter = $renterManager->getRenter($_GET['id']);
        require('view/backend/renters/readView.php');
    }

    public function updateRenter() {
        // même chose qu'insertRenter
        // méthode permettant de valider mes cases
        // je modifie dans la bdd (UPDATE)
        // je renvoie vers la liste
        // si les cases ne sont pas valides, je renvoie vers editrenter
    }

    public function editRenter() {
        $renterManager = new RenterManager();
        $renter = $renterManager->getRenter($_GET['id']);
        require('view/backend/renters/editView.php');
    }

    public function deleteRenter() {
        $renterManager = new RenterManager();
        $renterManager->deleteRenter($_GET['id']);
        header('Location: index.php?action=listrenters');
        exit;
    }

    public function listRenters() {
        $renterManager = new RenterManager();
        $renters = $renterManager->getRenters();
        require('view/backend/renters/listView.php');
    }
}