<?php
class Commentaire
{
    private $id;
    private $id_user;
    private $id_article;
    
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=blog', 'root');

    }
    public function getcombyid($get)
    {
        $sth = $this->pdo->prepare("SELECT commentaires.commentaire, commentaires.date, utilisateurs.login, utilisateurs.active FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur=utilisateurs.id WHERE id_article=$get ORDER BY date DESC ");
        $sth->execute();
        $commentaire = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $commentaire;

    }

    public function insertcom($com,$get,$user)
    {
        $sth=$this->pdo->prepare("INSERT INTO commentaires(commentaire, id_article, id_utilisateur, date) VALUES (?,?,?,?)");
        $date = new DateTime();
        $date->setTimestamp(time());
        $jour = $date->format('Y-m-d H:i:s');
        $sth->execute(array($com,$get,$user,$jour));
    }
}