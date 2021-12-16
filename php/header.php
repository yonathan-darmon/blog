<?php
session_start();
require "classe_article.php";
require "classes-categorie.php";
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
    <title>Document</title>
</head>
<body>

</body>
</html>
<nav>
    <ul>
        <li><a href="../index.php">Accueil</a></li>

        <li>
            <div class="dropdown">
                <button>Articles</button>
            <ul>
                <div class="dropdown-content">
                    <?php
                    $catego = new Categorie();
                    $cat = $catego->getcatego();
                    for ($i = 0; isset($cat["$i"]); $i++) {
                        echo '<li><a href="article.php?categorie=' . $cat["$i"]['id'] . '">' . $cat["$i"]['nom'] . '</a>';
                    }
                    ?>
                </div>
            </ul>
            </div>


        </li>
        <?php
        if (!isset($_SESSION['id'])) {
            echo "<li><a href='inscription.php'>Inscritpion</a></li>";
            echo "<li><a href='connexion.php'>Connexion</a></li>";
        } else {
            echo "<li><a href='profil.php'>Profil</a></li>";
            echo "<li><form action='#' method='post'><input type='submit' name='deco' value='deco'></form></li>";

        }
        if (isset($_POST['deco'])) {
            $ab = new User();
            $ab->disconnect();
        }
        $test = new User();
        if (isset($_SESSION['id'])) {
            $test->getDroits($_SESSION['id']);
            if ($test->droits == 42 || $test->droits == 1337) {
                echo "<li><a href='creer-article.php'>Créer un article</a></li>";
            }
            if ($test->droits == 1337) {
                echo "<li><a href='admin.php'>Page Admin</a></li>";

            }
        }
        ?>

    </ul>
</nav>
