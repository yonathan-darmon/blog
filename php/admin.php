<?php
session_start();
require "classe-commentaire.php";
require "classes-categorie.php";
require "classe_article.php";
require "classes_user.php";
require "fonction.php";
if
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
    <title>admin</title>
</head>
<body>
<header>
    <?php
    require "header.php";
    ?>
</header>
<main>
    <form action="#" method="get">
        <select name="modification" id="modification">
            <option value="articles">Articles</option>
            <option value="user">User</option>
            <option value="categories">Catégories</option>
        </select>
        <input type="submit" name="choix" value="categorie">
    </form>
    <?php
    if (isset($_GET['choix'])) {
        unset($_SESSION['modification']);
        if ($_GET['modification'] == "user") {
            echo "<table class='user'>";
            $user = new User();
            $userinfo = $user->getAllInfo();
            echo "<tr>";
            foreach ($userinfo as $key) {
                foreach ($key as $value => $value2) {
                    echo "<th>$value</th>";
                }
                break;
            }

            echo "</tr>";
            foreach ($userinfo as $key) {
                echo "<tr>";
                foreach ($key as $value) {
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            }


            echo "</table>";
            ?>
            <form action="#" method="post">
                <select name="id" id="id">
                    <?php
                    for ($i = 0; $userinfo[$i]; $i++) {
                        echo '<option value=' . $userinfo[$i]['id'] . '>' . $userinfo[$i]['id'] . '</option>';
                    }


                    ?>
                </select>
                <input type="submit" name="login" value="choix">

            </form>
            <?php
        }
    }
    ?>
    <?php
    if (isset($_GET['choix'])) {
        admin($_GET['modification']);
        var_dump($_GET);
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