<?php
require('controller/frontend.php');
require('controller/backend.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'home') {
        home();
    } elseif ($_GET['action'] == 'login') {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            checkLogin();
        } else {
            login();
        } 
    } elseif ($_GET['action'] == 'models') {
        models();
    } elseif ($_GET['action'] == 'model') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            model();
        } else {
            models();
        }
    } elseif ($_GET['action'] == 'renters') {
        renters();
    } elseif ($_GET['action'] == 'renter') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            renter();
        } else {
            renters();
        }
    } elseif ($_GET['action'] == 'addrenter') {
        addRenter();
    } elseif($_GET['action'] == 'editrenter') {
        editRenter();  
    } elseif($_GET['action'] == 'listrenters') {
        listRenters();
    } elseif ($_GET['action'] == 'readrenter') {
        if(isset($_GET['id']) && $_GET['id'] > 0) {
            readRenter();
    } else {
        home();
    }
}else {
    home();
}
}