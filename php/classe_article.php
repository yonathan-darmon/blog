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
        $date = time();
        $sth->execute(array($article, $id_utilisateur, $id_categorie, $date));


    }

    public function get5Article($get, $categorie = '')
    {

        if (empty($categorie)) {
            $sth = $this->pdo->prepare("SELECT articles.article, articles.date, utilisateurs.login, utilisateurs.active FROM articles INNER JOIN utilisateurs on utilisateurs.id=articles.id_utilisateur ORDER BY date DESC LIMIT $get,5 ");
        } else {
            $sth = $this->pdo->prepare("SELECT articles.article, articles.date, utilisateurs.login, utilisateurs.active  FROM articles INNER JOIN utilisateurs on utilisateurs.id=articles.id_utilisateur WHERE articles.id_categorie=$categorie ORDER BY date DESC LIMIT $get,5 ");
        }
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }


}