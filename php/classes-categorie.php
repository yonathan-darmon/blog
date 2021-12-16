<?php
class Categorie{
    private $id;
    public $nom;
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=blog', 'root');
    }

    public function getcatego()
    {
        $sth=$this->pdo->prepare("SELECT * FROM categories ");
        $sth->execute();
        $res=$sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
}