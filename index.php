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
    <?php
    require "php/header.php"
    ?>
</header>
<main>
    <p class="welcome">Bienvenue dans la Rams Family</p>
    <img src="asset/IMAGE/ramshouse.jpg" alt="ramshouse">

</main>
<footer>
    <?php
    require "php/footer.php";
    ?>
</footer>

</body>
</html>
