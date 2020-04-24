<?php

namespace Combis\Controller;

use \Combis\Model\RenterManager;

require_once('model/RenterManager.php');

class AdminRenterController {
    public function addRenter() {
        require('view/backend/renters/addView.php');
    }

    public function insertRenter() {
        if(!empty($_POST['address']) && !empty($_POST['zipcode']) && !empty($_POST['city'])){
            //vérifier que le code postal le téléphone et le site leur format
            // voir dans la documentation var_filter autre que l'email
            $renterManager = new RenterManager();
            $renterManager->insertRenter();
            header('Location: index.php?action=listrenters');
            exit;
        } else {
            require('view/backend/renters/addView.php');
        }
    }

    // méthode permettant de valider mes cases
    // je modifie dans la bdd (UPDATE)
    // je renvoie vers la liste
    // si les cases ne sont pas valides, je renvoie vers editrenter

    public function editRenter() {
        $renterManager = new RenterManager();
        $renter = $renterManager->getRenter($_GET['id']);
        require('view/backend/renters/editView.php');
    }

    public function listRenters() {
        $renterManager = new RenterManager();
        $renters = $renterManager->getRenters();
        require('view/backend/renters/listView.php');
    }

    public function readRenter() {
        $renterManager = new RenterManager();
        $renter = $renterManager->getRenter($_GET['id']);
        require('view/backend/renters/readView.php');
    }
}