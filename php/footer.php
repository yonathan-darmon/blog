<nav class="footer">
    <div class="bas">
        <ul>
            <li><a href="../index.php">Accueil</a></li>

            <li><a href="articles.php?start=0&categorie=0">Article</a></li>
            <?php
            if (!isset($_SESSION['id'])) {
                echo "<li><a href='inscription.php'>Inscription</a></li>";
                echo "<li><a href='connexion.php'>Connexion</a></li>";
            } else {
                echo "<li><a href='profil.php'>Profil</a></li>";
            }
            $test = new User();
            if (isset($_SESSION['id'])) {
                $res = $test->getAllInfoForOneUser($_SESSION['login']);
                if ($res['id_droits'] == 42 || $res['id_droits'] == 1337) {
                    echo "<li><a href='creer-article.php'>Créer un article</a></li>";
                }
                if ($res['id_droits'] == 1337) {
                    echo "<li><a href='admin.php'>Page Admin</a></li>";

                }
            }

            ?>

        </ul>
        <div class="projet">
            <a href="https://github.com/yonathan-darmon"><p>En savoir plus sur ce projet</p>
            <i class="fab fa-github fa-4x"></i></a>
        </div>
            <img class="logobas" src="../asset/IMAGE/la-rams-logo-1.png" alt="logo">
    </div>
    <p class="right">All rights reserved | Copyright 2021 - 2022 | Created by Yonathan Darmon </p>
</nav>