<?php
session_start();
require "classes-categorie.php";
require "classe_article.php";
require "classes_user.php";
$info = new User();
$res4 = $info->getAllInfo($_SESSION['login']);
$res5 = $info->getDroits($res4[0]['id_droits']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../asset/CSS/header.css">
    <link rel="stylesheet" href="../asset/CSS/inscription.css">
    <link rel="icon" type="image/png" href="../asset/IMAGE/android-icon-192x192.png">
    <title>Document</title>
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
        if (empty($_POST['login']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['confirm'])) {
            echo "<p class='error1'>Veuillez remplir tout les champs!</p>";
        } elseif ($_POST['password'] != $_POST['confirm']) {
            echo "<p class='error1'>Verifiez votre mot de passe</p> ";
        } else {
            $update = new User();
            $update->update($_POST['login'], $_POST['password'], $_POST['email']);


        }
    }
    ?>
    <h1 class="titre">Modifiez vos données</h1>
    <div class="container">
        <img src="../asset/IMAGE/sean.jpg" alt="McVay" class="gauche">
        <form action="#" method="post" class="inscription">
            <label for="login">Nom d'utilisateur</label>
            <input type="text" name="login" placeholder="<?php echo $res4[0]['login']; ?>">
            <label for="email">Votre Email</label>
            <input type="text" name="email" placeholder="<?php echo $res4[0]['email']; ?>">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" placeholder="Votre mot de passe">
            <label for="confirm">Confirmation de votre mot de passe</label>
            <input type="password" name="confirm" placeholder=" Votre mot de passe">
            <label for="droits">Vos droits utilisateurs</label>
            <input type="text" name="droits" value="<?php echo $res5[0]['nom']; ?>" readonly>
            <input type="submit" class="btn" name="submit" value="Modification">
        </form>
    </div>
</main>
<footer>
    <?php
    require "footer.php";
    ?>
</footer>
</body>
</html>
