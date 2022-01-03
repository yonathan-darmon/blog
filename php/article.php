<?php
session_start();
require "classes_user.php";
require "classe_article.php";
require "classes-categorie.php";
var_dump($_GET);
var_dump($_SESSION);
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
    $articles=new Article();
    $huit=$articles->getarticlebyid($_GET['id']);
    var_dump($huit);
    ?>
</main>
<footer>
    <?php
    require "footer.php";
    ?>
</footer>
</body>
</html>
