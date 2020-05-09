<?php

namespace Combis\Controller;

use \Combis\Model\UserManager;

require_once('model/UserManager.php');

class LoginController {
    public function checkLogin() {
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $userManager = new UserManager();
            $user = $userManager->getUser($_POST['email']);
            if($_POST['email'] == $user['email'] && $_POST['password'] == $user['password']) {
                session_start();
                $_SESSION['login'] = $user['email'];
                header('Location: index.php?action=listrenters');
                exit;
            } else {
                require('view/frontend/loginView.php');
            }
        } else {
            require('view/frontend/loginView.php');
        }
    }
    
    public function login() {
        require('view/frontend/loginView.php');
    }

    public function deconnexion() {
        session_start();
        unset($_SESSION);
        session_destroy();
        header('Location: index.php?action=login');
        exit;
    }
}