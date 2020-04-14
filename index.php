<?php
require('controller/frontend.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'home') {
        home();
    } elseif ($_GET['action'] == 'renters') {
       renters();
    } elseif ($_GET['action'] == 'models') {
        models();
    } elseif ($_GET['action'] == 'model') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            model();
        } else {
            echo 'Erreur';
        }
    } elseif ($_GET['action'] == 'login') {
        login();
    }
}else {
    home();
}
