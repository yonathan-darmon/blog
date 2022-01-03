<?php
session_start();
require "classes_user.php";
require "classe_article.php";
require "classes-categorie.php";
if (isset($_GET['categorie'])) {
    $_SESSION['categorie'] = $_GET['categorie'];

}
if (isset($_GET['start'])) {
    $_SESSION['start'] = $_GET['start'];
}
$test3 = $_SESSION['start'];
$test2 = $_SESSION['categorie'];
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
    <aside>

        <ul>
            <li class="catego">Categorie d'article
                <ul class="cache">
                    <?php
                    $catego2 = new Categorie();
                    $cat2 = $catego2->getcatego();
                    for ($i = 0; isset($cat2[$i]); $i++) {
                        echo '<li><a href="http://localhost/blog/blog/php/articles.php?start=' . $test3 . '&categorie=' . $cat2[$i]['id'] . '">' . $cat2[$i]['nom'] . '</a></li>';
                    }
                    ?>
                </ul>
            </li>
        </ul>
    </aside>
    <div class="container">

        <?php
        $article = new Article();
        if (isset($_GET['categorie'])) {
            $res = $article->get5Article($_GET['start'], $_GET['categorie']);
            for ($i = 0; isset($res[$i]); $i++) {
                $article = explode('/', $res[$i]['article']);
                var_dump($res[$i]);
                echo "<div class='article'>";
                echo '<h1 class=titre><a href=article.php?id='. $res[$i]['id'].'>' . $article[0] . '</a></h1>';
                echo '<p class=corp>' . $article[1] . '</p>';
                if ($res[$i]['active'] == 0) {
                    echo '<p class= login>Ecrit par ' . $res[$i]['login'] . '</p>';
                    $date = strtotime($res[$i]['date']);
                    echo '<p class=date' . $i . '> le ' . date('d/m/Y ', $date) . '</p>';
                } else {
                    echo '<p class= login>Ecrit par Utilisateur</p>';
                    $date = strtotime($res[$i]['date']);
                    echo '<p class=date' . $i . '> le ' . date('d/m/Y H:i', $date) . '</p>';
                }
                echo "</div>";
            }
        } else {
            $res = $article->get5Article($_GET['start']);
            for ($i = 0; isset($res[$i]); $i++) {
                echo "<div class='article'>";
                echo '<p class=text>' . $res[$i]['article'] . '</p>';
                if ($res[$i]['active'] == 0) {
                    echo '<p class= login>Ecrit par ' . $res[$i]['login'] . '</p>';
                    $date = strtotime($res[$i]['date']);
                    echo '<p class=date' . $i . '> le ' . date('d/m/Y H:i', $date) . '</p>';
                } else {
                    echo '<p class= login>Ecrit par Utilisateur</p>';
                    $date = strtotime($res[$i]['date']);
                    echo '<p class=date' . $i . '> le ' . date('d/m/Y H:i', $date) . '</p>';
                }
                echo "</div>";

            }

        }
        ?>
    </div>
    <?php
    if (empty($res)) {
        echo "<p class='arriere'>Il faut revenir en arriere pour lire un article !</p>";
    }
    $test = $_GET['start'];

    if (isset($_GET['gauche'])) {
        $test = $test - 5;
        header('Refresh:0;URL =articles.php?start=' . $test . '&categorie=' . $test2 . '');
    } elseif (isset($_GET['droite'])) {
        $test = $test + 5;
        header('Refresh:0;URL =articles.php?start=' . $test . '&categorie=' . $test2 . '');

    }
    if ($_GET['start'] == 0) {

        echo "<form action='#' method='get' class='chevron'>";
        echo "<input type='hidden' name='start' value='$test'>";
        echo '<input type="submit" name="droite" class="droite"  value="" readonly>';
    } elseif ($_GET['start'] > 0 && !empty($res)) {
        echo "<form action='#' method='get' class='chevron'>";
        echo "<input type='hidden' name='start' value='$test'>";
        echo '<input type="submit" name="gauche" class="gauche" value=""  readonly>';
        echo '<input type="submit" name="droite" class="droite"  value="" readonly>';
    } elseif (empty($res)) {
        echo "<form action='#' method='get' class='chevron'>";
        echo "<input type='hidden' name='start' value='$test'>";
        echo '<input type="submit" name="gauche" class="gauche" value=""  readonly>';
    }

    echo " </form>";

    ?>
</main>
<footer>
    <?php
    require "footer.php";
    ?>
</footer>

</body>
</html>
