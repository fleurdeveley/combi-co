<?php

namespace Combis\Model;

require_once("model/Manager.php");

class UserManager extends Manager {
    public function getUser($userId) {
        $bdd = $this->bddConnect();
        $query = $bdd->prepare('
        SELECT * FROM users
        WHERE email = ?
        ');
        $query->execute([$userId]);
        $user = $query->fetch();
        $query->closeCursor();
        return $user;
    }
}