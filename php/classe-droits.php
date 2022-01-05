<?php

class Droits
{
    private $id;
    public $nom;

    public function getDroits($droits)
    {
        $sth = $this->pdo->prepare("SELECT nom FROM droits");
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
}