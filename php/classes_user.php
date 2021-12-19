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
        $this->pdo = new PDO('mysql:host=localhost;dbname=blog', 'root');
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
                $sth = $this->pdo->prepare("INSERT INTO utilisateurs(login, password, email, id_droits) VALUES (?,?,?,?)");
                $droits = 1;
                $sth->execute(array($login, password_hash($password, PASSWORD_DEFAULT), $email, $droits));
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
        if ($login === $res['login'] && password_verify($password, $res['password'])) {
            $this->id = $res['id'];
            $this->login = $login;
            $this->email = $res['email'];
            $this->droits = $res['id_droits'];
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $res['id'];

        } else {
            echo 'Verifiez Login ou Mot de passe';
        }
    }

    public function disconnect()
    {
        if (isset($_SESSION)) {
            session_unset();
        }
    }

    public function update($login, $password, $email)
    {
        $log = $_SESSION['login'];
        $sth = $this->pdo->prepare("SELECT id FROM utilisateurs WHERE login='$log'");
        $sth->execute();
        $res = $sth->fetch(PDO::FETCH_ASSOC);
        $this->login = $login;
        $this->email = $email;
        $_SESSION['login'] = $login;
        $id = $_SESSION['id'];
        try {

            $sth2 = $this->pdo->prepare("UPDATE utilisateurs SET login = ?,password = ?,email = ? WHERE id=$id");
            $sth2->execute(array($login, $password, $email));
        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";

        }


    }

    public function isConnected()
    {
        if (isset($_SESSION['login'])) {
            return true;
        } else {
            return false;
        }
    }

    public function getDroits($droits)
    {
        $sth = $this->pdo->prepare("SELECT id_droits FROM utilisateurs WHERE id=$droits");
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

}
