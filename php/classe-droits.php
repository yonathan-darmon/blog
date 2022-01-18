<?php

class Droits
{
    private $id;
    public $nom;
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=blog', 'root');
    }

    public function getDroitsById($droits)
    {
        $sth = $this->pdo->prepare("SELECT nom FROM droits WHERE id=$droits");
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getDroits()
    {
        $sth = $this->pdo->prepare("SELECT nom FROM droits");
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getDroitsByName($nom)
    {
        $sth=$this->pdo->prepare("SELECT id FROM droits WHERE nom='$nom'");
        $sth->execute();
        $res= $sth->fetch();
        return $res;
    }
}