<?php

namespace Combis\Model;

require_once("model/Manager.php");

class NewsletterManager extends Manager
{
    public function insertNewsletter()
    {
        $bdd = $this->bddConnect();
        $query = $bdd->prepare('
        INSERT INTO newsletter (email)
        VALUES (?)
        ');
        $query->execute([$_POST['email']]);
        $query->closeCursor();
    }

    public function getNewsletter()
    {
        $bdd = $this->bddConnect();
        $query = $bdd->prepare('
        SELECT email FROM newsletter
        WHERE email = ?
        ');
        $query->execute([$_POST['email']]);
        $email = $query->fetch();
        $query->closeCursor();
        return $email;
    }
}
