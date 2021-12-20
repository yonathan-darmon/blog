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
    <link rel="icon" type="image/png" href="../asset/IMAGE/android-icon-192x192.png">
    <link rel="stylesheet" href="../asset/CSS/articles.css">

    <title>Articles</title>
</head>
<body>
<header>
    <?php
    require "header.php";
    ?>
</header>
<main>
    <div class="container">
        <?php
        $article = new Article();
        if (isset($_GET['categorie'])) {
            $res = $article->get5Article($_GET['start'], $_GET['categorie']);
            for ($i = 0; isset($res[$i]); $i++) {
                echo "<div class='article'>";
                echo '<p class=text>' . $res[$i]['article'] . '</p>';
                if ($res[$i]['active'] == 0) {
                    echo '<p class= login' . $i . '>Ecrit par ' . $res[$i]['login'] . '</p>';
                    $date = strtotime($res[$i]['date']);
                    echo '<p class=date' . $i . '> le ' . date('d/m/Y H:i', $date) . '</p>';
                } else {
                    echo '<p class= login' . $i . '>Ecrit par Utilisateur</p>';
                    $date = strtotime($res[$i]['date']);
                    echo '<p class=date' . $i . '> le ' . date('d/m/Y H:i', $date) . '</p>';
                }
                echo "</div>";
            }
        } else {
            $res = $article->get5Article($_GET['start']);
            for ($i = 0; isset($res[$i]); $i++) {

                echo '<p class=article>' . $res[$i]['article'] . '</p>';
            }

        }
        ?>
    </div>
</main>
<footer>
    <?php
    require "footer.php";
    ?>
</footer>

</body>
</html>
