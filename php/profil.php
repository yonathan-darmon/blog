<?php
session_start();
require "classes-categorie.php";
require "classe_article.php";
require "classes_user.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../asset/CSS/header.css">
    <link rel="stylesheet" href="../asset/CSS/inscription.css">
    <link rel="icon" type="image/png" href="../asset/IMAGE/android-icon-192x192.png">
    <title>Document</title>
</head>
<body>
<header>
    <?php
    require "header.php";
    ?>
</header>
<main>
    <main>

        <h1 class="titre">Modifiez vos données</h1>
        <div class="container">
            <img src="../asset/IMAGE/sean.jpg" alt="McVay" class="gauche">
            <form action="#" method="post" class="inscription">
                <label for="login">Nom d'utilisateur</label>
                <input type="text" name="login" placeholder="Entrez votre Nom d'utilisateur">
                <label for="email">Votre Email</label>
                <input type="text" name="email" placeholder="Entrez votre email">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" placeholder="Votre mot de passe">
                <label for="confirm">Confirmation de votre mot de passe</label>
                <input type="password" name="confirm" placeholder=" Votre mot de passe">
                <label for="droits">Vos droits utilisateurs</label>
                <input type="text" name="droits" value="utilisateur" readonly>
                <input type="submit" class="btn" name="submit" value="Modification">
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
