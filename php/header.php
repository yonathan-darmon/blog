<nav>
    <ul>
        <img class="logo" src="http://localhost/blog/blog/asset/IMAGE/la-rams-logo-1.png" alt="">
        <li><a href="../index.php">Accueil</a></li>

        <li class="dropdown"><a href="http://localhost/blog/blog/php/articles.php">Articles</a>


            <ul class="dropdown-content">
                <?php
                $catego = new Categorie();
                $cat = $catego->getcatego();
                for ($i = 0; isset($cat["$i"]); $i++) {
                    echo '<li><a href="http://localhost/blog/blog/php/article.php?categorie=' . $cat["$i"]['id'] . '">' . $cat["$i"]['nom'] . '</a>';
                }
                ?>
            </ul>

        </li>
        <?php
        if (!isset($_SESSION['id'])) {
            echo "<li><a href='http://localhost/blog/blog/php/inscription.php'>Inscription</a></li>";
            echo "<li><a href='http://localhost/blog/blog/php/connexion.php'>Connexion</a></li>";
        } else {
            echo "<li><a href='http://localhost/blog/blog/php/profil.php'>Profil</a></li>";
            echo "<li><form action='#' method='post' class='deco'><input type='submit' name='deco' value='deco'></form></li>";

        }
        if (isset($_POST['deco'])) {
            $ab = new User();
            $ab->disconnect();
        }
        $test = new User();
        if (isset($_SESSION['id'])) {
            $test->getDroits($_SESSION['id']);
            if ($test->droits == 42 || $test->droits == 1337) {
                echo "<li><a href='http://localhost/blog/blog/php/creer-article.php'>Créer un article</a></li>";
            }
            if ($test->droits == 1337) {
                echo "<li><a href='http://localhost/blog/blog/php/admin.php'>Page Admin</a></li>";

            }
        }
        ?>

    </ul>
</nav>
