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

        $sth = $this->pdo->prepare("INSERT INTO articles(`article`,`id_utilisateur`,`id_categorie`,`date`,enligne) VALUES(?,?,?,?,?)");
        $date = new DateTime();
        $date->setTimestamp(time());
        $jour = $date->format('Y-m-d H:i:s');
        $online=0;
        $sth->execute(array($article, $id_utilisateur, $id_categorie, $jour,$online));
        var_dump($jour);
        var_dump($article);
        var_dump($id_utilisateur);
        var_dump($id_categorie);

    }

    public function get5Article($get, $categorie = '')
    {

        if (empty($categorie)) {
            $sth = $this->pdo->prepare("SELECT articles.article, articles.date, utilisateurs.login, utilisateurs.active, articles.id  FROM articles INNER JOIN utilisateurs on utilisateurs.id=articles.id_utilisateur WHERE articles.enligne!=1 ORDER BY date DESC LIMIT $get,5 ");
        } else {
            $sth = $this->pdo->prepare("SELECT articles.article, articles.date, utilisateurs.login, utilisateurs.active, articles.id  FROM articles INNER JOIN utilisateurs on utilisateurs.id=articles.id_utilisateur WHERE articles.enligne!=1 AND articles.id_categorie=$categorie ORDER BY date DESC LIMIT $get,5 ");
        }
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getArticleById($get)
    {
        $sth = $this->pdo->prepare("SELECT articles.article, utilisateurs.login, articles.date FROM articles INNER JOIN utilisateurs ON articles.id_utilisateur=utilisateurs.id WHERE articles.id=$get");
        $sth->execute();
        $article= $sth->fetch();
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

    public function update($article, $catego, $enligne,$id)
    {
        $sth=$this->pdo->prepare("UPDATE articles SET article=?,id_categorie=?,enligne=? WHERE id=$id");
        $sth->execute(array($article,$catego,$enligne));
        echo "<p class='confirmation'> Votre Modification a été prise en compte</p>";

    }



}