<?php
session_start();
require "classes-categorie.php";
require "classe_article.php";
require "classes_user.php";
if (isset($_POST['titre']) && isset($_POST['corp'])) {
    $article = $_POST['titre'] . '/' . $_POST['corp'];
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../asset/CSS/header.css">
    <link rel="stylesheet" href="../asset/CSS/creerarticle.css">
    <title>création d'artcile</title>
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
        if (empty($_POST['titre']) || empty($_POST['corp'])) {
            echo "<p class='error1'> Veuillez remplir tout les champs</p>";
        } else
            if (isset($_POST['catego'])) {
                $nom = $_POST['catego'];
                $catego2 = new Categorie();
                $idcatego = $catego2->getid($nom);
                $insert = new Article();
                $insert->creation($article, $_SESSION['id'], $idcatego['id']);
                echo "<p class='confirmation'>Votre article est correctement enregistré</p>";
            }
    }
    ?>
    <div class="container">
        <img src="" alt="" class="gauche">
        <form action="#" method="post">
            <select name="catego" id="catego">
                <?php
                $catego = new Categorie();
                $res5 = $catego->getcatego();
                for ($i = 0;
                isset($res5[$i]);
                     $i++) {
                    echo '<option value=' . $res5[$i]['nom'] . '>' . $res5[$i]['nom'] . '</option>';
                }
                ?>
            </select>
            <?php

            ?>
            <label for="titre">Titre de l'article</label>
            <input type="text" name="titre" placeholder="Votre titre">
            <label for="corp">Article</label>
            <textarea id="corp" name="corp" placeholder="Votre article" rows="5" cols="33"></textarea>
            <input type="submit" name="submit" value="Envoyer">
        </form>
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
