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
        $sth2 = $this->pdo->prepare("SELECT commentaires.commentaire, utilisateurs.login, utilisateurs.active FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur=utilisateurs.id WHERE id_article=$get");
        $sth2->execute();
        $commentaire = $sth2->fetchAll(PDO::FETCH_ASSOC);
        return $commentaire;

    }
}