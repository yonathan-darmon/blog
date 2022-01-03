<?php
session_start();
require "classes-categorie.php";
require "classe_article.php";
require "classes_user.php";
$article = $_POST['titre'] . '/' . $_POST['corp'];

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

    <div class="container">
        <img src="" alt="" class="gauche">
        <form action="#" method="post">
            <label for="titre">Titre de l'article</label>
            <input type="text" name="titre" placeholder="Votre titre">
            <label for="corp">Article</label>
            <textarea id="corp" name="corp" placeholder="Votre article"></textarea>
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
