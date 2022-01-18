<?php

class User
{
    private $id;
    public $login;
    public $password;
    public $email;
    public $droits;
    private $bd;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost:3306;dbname=yonathan-darmon_blog', 'yonathan-darmon','071187061283Darmon@');
    }

    public function register($login, $password, $email)
    {
        try {
            $req = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE login=?");
            $req->bindValue(1, $login, PDO::PARAM_STR);
            $req->execute();
        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        $res = $req->fetch(PDO::FETCH_ASSOC);
        if ($res == false) {
            try {
                $sth = $this->pdo->prepare("INSERT INTO utilisateurs (login, password, email, id_droits, active) VALUES (?,?,?,?,?)");
                $droits = 1;
                $passwordprotect= password_hash($password, PASSWORD_DEFAULT);
                $active=0;
                $sth->execute(array($login, $passwordprotect, $email, $droits, $active));
                $confirmation = '<p class="confirmation">Bienvenue ' . $_POST['login'] . ' dans la Rams Family</p>';
                echo $confirmation;
            } catch (Exception $e) {
                echo 'Exception reçue : ', $e->getMessage(), "\n";
            }
        } elseif ($res == true) {

            $error2 = "<p class='error1'>Ce Nom d'utilisateur existe déjà</p>";
            echo $error2;
        }
    }

    public function connect($login, $password)
    {
        $sth = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE login =?");
        $sth->execute(array($login));
        $res = $sth->fetch(PDO::FETCH_ASSOC);
        if ($login === $res['login'] && password_verify($password, $res['password']) && $res['active']==0) {
            $this->id = $res['id'];
            $this->login = $login;
            $this->password = $password;
            $this->email = $res['email'];
            $this->droits = $res['id_droits'];
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $res['id'];
            $_SESSION['droits'] = $res['id_droits'];
            echo "<p class='confirmation'>Vous êtes bien connecté</p>";
            header('Refresh:3; URL=articles.php?start=0&categorie=0');

        } elseif($login === $res['login'] && password_verify($password, $res['password']) && $res['active']==1 ) {
            echo '<p class="error1">Votre compte est inactif veuillez contacter l\'administrateur</p>';
        }
        else{
            echo '<p class="error1">Verifiez Login ou Mot de passe</p>';
        }
    }

    public function disconnect()
    {
        if (isset($_SESSION)) {
            session_unset();
            header("location:https://yonathan-darmon.students-laplateforme.io/index.php");
        }
    }

    public function getLogin($login)
    {
        $sth = $this->pdo->prepare("SELECT login FROM utilisateurs WHERE login='$login' ");
        $sth->execute();
        return $sth->fetch();

    }

    public function getAllInfoForOneUser($login)
    {
        $sth = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE login='$login'");
        $sth->execute();
        return $sth->fetch();

    }

    public function update($login, $password, $email)
    {

        $res3 = $this->getAllInfoById($_SESSION['id']);
        $res4 = $this->getLogin($login);
        if (empty($res4) || $res3['login']==$login) {

            $log = $_SESSION['login'];
            $sth = $this->pdo->prepare("SELECT id FROM utilisateurs WHERE login='$log'");
            $sth->execute();
            $res = $sth->fetch(PDO::FETCH_ASSOC);
            $this->login = $login;
            $this->email = $email;
            $this->password = $password;
            $_SESSION['login'] = $login;
            $id = $_SESSION['id'];
            try {

                $sth2 = $this->pdo->prepare("UPDATE utilisateurs SET login = ?,password = ?,email = ? WHERE id=$id");
                $sth2->execute(array($login, password_hash($password, PASSWORD_DEFAULT), $email));
                echo "<p class='confirmation'>Modifications effectuées</p>";
            } catch (Exception $e) {
                echo 'Exception reçue : ', $e->getMessage(), "\n";

            }


        } else {
            echo "<p class='error1'>Ce login existe déjà</p>";
        }
    }

    public
    function isConnected()
    {
        if (isset($_SESSION['login'])) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllInfoById($id)
    {
        $sth = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE id=$id");
        $sth->execute();
        $res = $sth->fetch();
        return $res;
    }

    public function getAllInfo()
    {
        $sth = $this->pdo->prepare("SELECT * FROM utilisateurs");
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function updateAdmin($id, $droits, $actif)
    {
        $sth = $this->pdo->prepare("UPDATE utilisateurs SET id_droits = ?, active = ? WHERE id=$id");
        $sth->execute(array($droits, $actif));
        echo"<p class='confirmation'>Modification prise en compte</p>";
    }


}
