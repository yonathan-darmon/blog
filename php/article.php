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
    <link rel="icon" type="image/png" href="../asset/IMAGE/android-icon-192x192.png">
    <script src="https://kit.fontawesome.com/225d5fd287.js" crossorigin="anonymous"></script>
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
    $date2 = strtotime($text['date']);

    $article = explode('/', $text['article']);
    $comm = new Commentaire();
    $com = $comm->getComAndUserById($_GET['id']);
    $id = $_GET['id'];
    if (isset($_POST['submit'])) {
        if (empty($_POST['titre']) || empty($_POST['corp'])) {
            echo "<p class='error1'>Veuillez remplir tout les champs</p>";
        } else {


            $corp = $_POST['titre'] . '/' . $_POST['corp'];
            $comm->insertcom($corp, $_GET['id'], $_SESSION['id']);
            echo "<p class='confirmation'> Votre commentaire est bien enregistré</p>";
            header("Refresh:2, URL=article.php?id=$id");
        }
    }
    ?>
    <div class="container">
        <img src="" alt="" class="gauche">
        <div class="card">
            <div class="cardarticle">
                <div class="corp">
                    <h1 class="titre"><?php echo $article[0]; ?></h1>
                    <p class="article"><?php echo $article[1]; ?></p>
                </div>
                <div class="infos">
                    <p>Ecrit par <?php echo $text['login']; ?></p>
                    <img src="../asset/IMAGE/Rams_de_LA_casque.png" alt="casque des rams">
                    <p>Le <?php echo date('d/m/Y', $date2); ?> </p>
                </div>
            </div>
            <div class="cardcom">
                <?php
                for ($i = 0; isset($com[$i]); $i++) {
                    $commentaire = explode('/', $com[$i]['commentaire']);
                    echo "<div class='infos2'>";
                    echo "<p>Titre: $commentaire[0]</p>";
                    if ($com[$i]['active'] == 0) {
                        echo '<p>Ecrit par ' . $com[$i]['login'] . '</p>';
                        $date = strtotime($com[$i]['date']);
                        echo '<p> le ' . date('d/m/Y', $date) . '</p>';
                    } else {
                        $date = strtotime($com[$i]['date']);
                        echo '<p>Ecrit par Utilisateur</p>';
                        echo '<p> le ' . date('d/m/Y', $date) . '</p>';
                    }
                    echo "</div>";
                    echo "<p class='commentaire'>$commentaire[1]</p>";

                }

                ?>
            </div>
        </div>
    </div>
        <form action="#" method="post" class="insertcom">
            <div class="box3">
            <p class="leavecom">Laissez un commentaire</p>
            <label for="titre">Titre du commentaire</label>
            <input type="text" name="titre" placeholder="votre titre">
            <label for="corp">Votre commentaire</label>
            <textarea id="corp" name="corp" placeholder="Votre article" rows="15" cols="33"></textarea>
            <input type="submit" name="submit" value="Envoyer">
            </div>
            <img src="../asset/IMAGE/belier.jpg" alt="logo" class="newlogo">
        </form>
</main>
<footer>
    <?php
    require "footer.php";
    ?>
</footer>
</body>
</html>
