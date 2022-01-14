<?php

class Categorie
{
    private $id;
    public $nom;
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=blog', 'root');
    }

    public function getcatego()
    {
        $sth = $this->pdo->prepare("SELECT * FROM categories ");
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    public function getid($nom)
    {
        $sth=$this->pdo->prepare("SELECT id FROM categories WHERE nom='$nom'");
        $sth->execute();
        $res=$sth->fetch(PDO::FETCH_ASSOC);
        return$res;
    }
    public function getAllInfoById($id)
    {
        $sth = $this->pdo->prepare("SELECT * FROM categories WHERE categories.id=$id");
        $sth->execute();
        $catego= $sth->fetch(PDO::FETCH_ASSOC);
        return$catego;
    }
    public function getAllCatego()
    {
        $sth=$this->pdo->prepare("SELECT * FROM categories");
        $sth->execute();
        $res=$sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getCategoByName($name)
    {
        $sth=$this->pdo->prepare("SELECT * FROM categories WHERE nom='$name'");
        $sth->execute();
        $res=$sth->fetch();
        return $res;
    }

    public function updateAdmin($nom,$get)
    {
        $sth=$this->pdo->prepare("UPDATE `categories` SET nom=? WHERE id=$get ");
        $sth->execute(array($nom));
        echo"<p class='confirmation'> Catégorie modifié</p>";
    }

    public function create($nom)
    {
        $sth=$this->pdo->prepare("INSERT INTO `categories`(`nom`) VALUES (?)");
        $sth->execute(array($nom));
        echo "<p class='confirmation'> Insertion de catégorie enregistrée</p>";
    }
}