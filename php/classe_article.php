<?php

class Article
{
    private $id;
    public $article;
    public $id_utilisateur;
    public $id_categorie;
    public $date;
    private $bd;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=blog', 'root');
    }

    public function creation($article, $id_utilisateur, $id_categorie)
    {

        $sth = $this->pdo->prepare("INSERT INTO articles(article,id_utilisateur,id_categori,date) VALUES(?,?,?,?)");
        $date=time();
        $sth->execute(array($article, $id_utilisateur, $id_categorie, $date));


    }

    public function get5Article($get)
    {
        $sth=$this->pdo->prepare("SELECT article FROM articles  ORDER BY date DESC LIMIT '$get',5 ");
        $sth->execute();

    }

}