<?php
session_start();
require "classes_user.php";
require "classe_article.php";
require "classes-categorie.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../asset/CSS/header.css">
    <link rel="stylesheet" href="../asset/CSS/connexion.css">
    <link rel="icon" type="image/png" href="../asset/IMAGE/android-icon-192x192.png">
    <script src="https://kit.fontawesome.com/225d5fd287.js" crossorigin="anonymous"></script>


    <title>Connexion</title>
</head>
<body>
<header>
    <?php
    require "header.php";
    ?>
</header>
<main>
    <?php
    if (isset($_POST['submit'])) {
        if (empty($_POST['login']) || empty($_POST['password'])) {
            echo "<p class='error1'> Veuillez remplir tout les champs</p>";
        } else {
            $connect = new User();
            $connect->connect($_POST['login'], $_POST['password']);

        }

    }
    ?>
    <h1 class="titre">Connexion</h1>
    <div class="container">
        <img class="ball" src="../asset/IMAGE/ball.jpeg" alt="ballon">
        <form action="#" class="connect" method="post">
            <label for="login">Nom d'utilisateur</label>
            <input type="text" name="login" placeholder="Votre login">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" placeholder="Votre mot de passe">
            <input id="connexion" type="submit" name="submit" value="Se connecter">
        </form>
    </div>

</main>
<footer>
    <?php
    require "footer.php";
    ?>
</footer>

</body>
</html>
