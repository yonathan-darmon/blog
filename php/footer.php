<nav class="footer">
    <ul>
        <li><a href="../index.php">Accueil</a></li>

        <li><a href="articles.php?start=0">Article</a></li>
        <?php
        if (!isset($_SESSION['id'])) {
            echo "<li><a href='inscription.php'>Inscription</a></li>";
            echo "<li><a href='connexion.php'>Connexion</a></li>";
        } else {
            echo "<li><a href='profil.php'>Profil</a></li>";
        }
        $test = new User();
        if (isset($_SESSION['id'])) {
            $res = $test->getAllInfo($_SESSION['login']);
            if ($res[0]['id_droits'] == 42 || $res[0]['id_droits'] == 1337) {
                echo "<li><a href='http://localhost/blog/blog/php/creer-article.php'>Créer un article</a></li>";
            }
            if ($res[0]['id_droits'] == 1337) {
                echo "<li><a href='http://localhost/blog/blog/php/admin.php'>Page Admin</a></li>";

            }
        }

        ?>

    </ul>
</nav>