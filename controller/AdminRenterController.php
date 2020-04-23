<?php

namespace Combis\Controller;

use \Combis\Model\RenterManager;

require_once('model/RenterManager.php');

class AdminRenterController {
    public function addRenter() {
        $renterManager = new RenterManager();
        require('view/backend/renters/addView.php');
    }

    public function insertRenter() {

        
    }

    // méthode permettant de valider mes cases
    // j'insere dans la bdd (INSERT)
    // je renvoie vers la liste
    // si les cases ne sont pas valide, je renvoie vers addrenter


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