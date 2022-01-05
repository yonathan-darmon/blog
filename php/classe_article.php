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

        $sth = $this->pdo->prepare("INSERT INTO articles(`article`,`id_utilisateur`,`id_categorie`,`date`) VALUES(?,?,?,?)");
        $date = new DateTime();
        $date->setTimestamp(time());
        $jour = $date->format('Y-m-d H:i:s');
        $sth->execute(array($article, $id_utilisateur, $id_categorie, $jour));

    }

    public function get5Article($get, $categorie = '')
    {

        if (empty($categorie)) {
            $sth = $this->pdo->prepare("SELECT articles.article, articles.date, utilisateurs.login, utilisateurs.active, articles.id  FROM articles INNER JOIN utilisateurs on utilisateurs.id=articles.id_utilisateur ORDER BY date DESC LIMIT $get,5 ");
        } else {
            $sth = $this->pdo->prepare("SELECT articles.article, articles.date, utilisateurs.login, utilisateurs.active, articles.id  FROM articles INNER JOIN utilisateurs on utilisateurs.id=articles.id_utilisateur WHERE articles.id_categorie=$categorie ORDER BY date DESC LIMIT $get,5 ");
        }
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getArticleById($get)
    {
        $sth = $this->pdo->prepare("SELECT article FROM articles WHERE articles.id=$get");
        $sth->execute();
        $article= $sth->fetchAll(PDO::FETCH_ASSOC);
        return$article;
    }

    public function getAllInfoById($id)
    {
        $sth = $this->pdo->prepare("SELECT * FROM articles WHERE articles.id=$id");
        $sth->execute();
        $article= $sth->fetchAll(PDO::FETCH_ASSOC);
        return$article;
    }
    public function getAllArticle()
    {
        $sth=$this->pdo->prepare("SELECT * FROM articles");
        $sth->execute();
        $res=$sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }



}