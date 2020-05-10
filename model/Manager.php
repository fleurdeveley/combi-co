<?php

namespace Combis\Model;

class Manager
{
    protected function bddConnect()
    {
        require('config.php');
        try {
            $bdd = new \PDO("mysql:host=" . $host . ";dbname=" . $dbName, $userBdd, $passBdd, $optionBdd);
            return $bdd;
        } catch (\Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
