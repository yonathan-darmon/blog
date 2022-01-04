<?php
session_start();
require "classes_user.php";
require "classe_article.php";
require "classes-categorie.php";
require "classe-commentaire.php";
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../asset/CSS/header.css">
    <link rel="stylesheet" href="../asset/CSS/article.css">
    <title>Article</title>
</head>
<body>
<header>
    <?php
    require "header.php";
    ?>
</header>
<main>
    <?php
    $art = new Article();
    $text = $art->getarticlebyid($_GET['id']);
    $article = explode('/', $text[0]['article']);
    $comm = new Commentaire();
    $com = $comm->getcombyid($_GET['id']);
    ?>
    <div class="container">
        <img src="" alt="" class="gauche">
        <div class="card">
            <div class="cardarticle">
                <h1 class="titre"><?php echo "$article[0]"; ?></h1>
                <p class="article"><?php echo "$article[1]"; ?></p>
            </div>
            <div class="cardcom">
                <?php
                for ($i = 0; isset($com[$i]); $i++) {
                    $commentaire = explode('/', $com[$i]['commentaire']);
                    echo "<h3 class='titrecom'>$commentaire[0]</h3>";
                    echo "<p class='commentaire'>$commentaire[1]</p>";
                    if ($com[$i]['active'] == 0) {
                        echo '<p>Ecrit par ' . $com[$i]['login'] . '</p>';
                    } else {
                        echo '<p>Ecrit par Utilisateur</p>';
                    }
                }

                ?>

            </div>
        </div>
        <img src="" alt="" class="droite">
    </div>
</main>
<footer>
    <?php
    require "footer.php";
    ?>
</footer>
</body>
</html>
