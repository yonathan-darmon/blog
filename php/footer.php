<nav class="footer">
    <ul>
        <li><a href="../index.php">Accueil</a></li>

        <li><a href="article.php">Article</a></li>
        <?php
        if (!isset($_SESSION['id'])) {
            echo "<li><a href='inscription.php'>Inscription</a></li>";
            echo "<li><a href='connexion.php'>Connexion</a></li>";
        } else {
            echo "<li><a href='profil.php'>Profil</a></li>";
        }
        $test = new User();
        if (isset($_SESSION['id'])) {
            $test->getDroits($_SESSION['id']);
            if ($test->droits == 42 || $test->droits == 1337) {
                echo "<li><a href='creer-article.php'>Créer un article</a></li>";
            }
            if ($test->droits == 1337) {
                echo "<li><a href='admin.php'>Page Admin</a></li>";

            }
        }
        ?>

    </ul>
</nav>