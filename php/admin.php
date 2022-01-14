<?php
session_start();
if ($_SESSION['droits'] != 1337) {
    header("location: connexion.php");
}
require "classe-commentaire.php";
require "classes-categorie.php";
require "classe_article.php";
require "classes_user.php";
require "classe-droits.php";
require "fonction.php";
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../asset/CSS/header.css">
    <link rel="stylesheet" href="../asset/CSS/admin.css">
    <link rel="icon" type="image/png" href="../asset/IMAGE/android-icon-192x192.png">
    <script src="https://kit.fontawesome.com/225d5fd287.js" crossorigin="anonymous"></script>
    <title>admin</title>
</head>
<body>
<header>
    <?php
    require "header.php";
    ?>
</header>
<main>
    <h1 class="titre">Page Admin</h1>
    <form action="#" method="get" class="mod">
        <label for="modification">Choix de la catégorie à modifier</label>
        <select name="modification" id="modification">
            <option value="articles">Articles</option>
            <option value="user">User</option>
            <option value="categories">Catégories</option>
            <option value="commentaire">Commentaires</option>
        </select>
        <input type="submit" name="choix" value="categorie">
    </form>
    <?php
    if (isset($_GET['choix'])) {
        admin($_GET['modification']);
    }

    ?>
</main>

<footer>
    <?php
    require "footer.php";
    ?>
</footer>
</body>
</html>