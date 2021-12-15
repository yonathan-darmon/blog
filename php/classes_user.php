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
    public function register($login, $password, $email, $droits)
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
                $sth->execute(array($login, $password, $email, $droits));
            } catch (Exception $e) {
                echo 'Exception reçue : ', $e->getMessage(), "\n";
            }
        }
        return [$login, $password, $email,$droits];
    }

    public function connect($login, $password)
    {
        $sth = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE login =?");
        $sth->execute(array($login));
        $res = $sth->fetch(PDO::FETCH_ASSOC);
        if ($login === $res['login'] && $password == $res['password']) {
            $this->login = $login;
            $this->email = $res['email'];
            $this->firstname = $res['firstname'];
            $this->lastname = $res['lastname'];
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $password;

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
    public function update($login, $password, $email, $firstname, $lastname)
    {
        $log = $_SESSION['login'];
        $sth = $this->pdo->prepare("SELECT id FROM utilisateurs WHERE login='$log'");
        $sth->execute();
        $res = $sth->fetch(PDO::FETCH_ASSOC);
        $id = $res['id'];
        $this->login = $login;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        try {
            $sth2 = $this->pdo->prepare("UPDATE utilisateurs SET login = ?,password = ?,email = ?,firstname = ?,lastname =? WHERE id=$id");
            $sth2->execute(array($login, $password, $email, $firstname, $lastname));
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
}