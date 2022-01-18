<?php
session_start();
require "php/classes_user.php";
require "php/classes-categorie.php";
require "php/classe_article.php";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="asset/CSS/header.css">
    <link rel="stylesheet" href="asset/CSS/index.css">
    <link rel="icon" type="image/png" href="asset/IMAGE/android-icon-192x192.png">
    <script src="https://kit.fontawesome.com/225d5fd287.js" crossorigin="anonymous"></script>
    <title>Accueil</title>
</head>
<body>
<header>
    <nav class="header">
        <ul class="main">
            <img class="logo" src="asset/IMAGE/la-rams-logo-1.png" alt="">
            <li><a href="index.php">Accueil</a></li>

            <li class="dropdown"><a href="php/articles.php?start=0&categorie=0">Articles</a>


                <ul class="dropdown-content">
                    <?php
                    $catego = new Categorie();
                    $cat = $catego->getcatego();
                    for ($i = 0; isset($cat["$i"]); $i++) {
                        echo '<li><a href="php/articles.php?start=0&categorie=' . $cat["$i"]['id'] . '">' . $cat["$i"]['nom'] . '</a>';
                    }
                    ?>
                </ul>

            </li>
            <?php
            if (!isset($_SESSION['id'])) {
                echo "<li><a href='php/inscription.php'>Inscription</a></li>";
                echo "<li><a href='php/connexion.php'>Connexion</a></li>";
            } else {
                echo "<li><a href='php/profil.php'>Profil</a></li>";


            }
            if (isset($_POST['deco'])) {
                $ab = new User();
                $ab->disconnect();
            }
            if (isset($_SESSION['droits'])) {
                if ($_SESSION['droits'] == 42 || $_SESSION['droits'] == 1337) {
                    echo "<li><a href='php/creer-article.php'>Créer un article</a></li>";
                }
                if ($_SESSION['droits'] == 1337) {
                    echo "<li><a href='php/admin.php'>Page Admin</a></li>";

                }
                echo "<li><form action='#' method='post' class='deco'><input type='submit' id='deco' name='deco' value='Deconnexion'></form></li>";
            }
            ?>

        </ul>
    </nav>
</header>
<main>
    <p class="welcome">Bienvenue dans la Rams Family</p>
    <img src="asset/IMAGE/ramshouse.jpg" alt="ramshouse">

</main>
<footer>
    <nav class="footer">
        <div class="bas">
            <ul>
                <li><a href="../index.php">Accueil</a></li>

                <li><a href="php/articles.php?start=0&categorie=0">Article</a></li>
                <?php
                if (!isset($_SESSION['id'])) {
                    echo "<li><a href='php/inscription.php'>Inscription</a></li>";
                    echo "<li><a href='php/connexion.php'>Connexion</a></li>";
                } else {
                    echo "<li><a href='php/profil.php'>Profil</a></li>";
                }
                $test = new User();
                if (isset($_SESSION['id'])) {
                    $res = $test->getAllInfoForOneUser($_SESSION['login']);
                    if ($res['id_droits'] == 42 || $res['id_droits'] == 1337) {
                        echo "<li><a href='http://localhost/blog/blog/php/creer-article.php'>Créer un article</a></li>";
                    }
                    if ($res['id_droits'] == 1337) {
                        echo "<li><a href='http://localhost/blog/blog/php/admin.php'>Page Admin</a></li>";

                    }
                }

                ?>

            </ul>
            <div class="projet">
                <p>En savoir plus sur ce projet</p>
                <a href="https://github.com/yonathan-darmon"><i class="fab fa-github fa-8x"></i></a>
            </div>
            <img class="logobas" src="/asset/IMAGE/la-rams-logo-1.png" alt="logo">
        </div>
        <p class="right">All rights reserved | Copyright 2021 - 2022 | Created by Yonathan Darmon </p>
    </nav>
</footer>

</body>
</html>
