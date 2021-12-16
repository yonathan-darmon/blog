<nav>
    <ul>
        <li><a href="../index.php">Accueil</a></li>

        <li class="dropdown"><a href="article.php">Articles</a>


            <ul class="dropdown-content">
                <?php
                $catego = new Categorie();
                $cat = $catego->getcatego();
                for ($i = 0; isset($cat["$i"]); $i++) {
                    echo '<li><a href="article.php?categorie=' . $cat["$i"]['id'] . '">' . $cat["$i"]['nom'] . '</a>';
                }
                ?>
            </ul>

        </li>
        <?php
        if (!isset($_SESSION['id'])) {
            echo "<li><a href='inscription.php'>Inscritpion</a></li>";
            echo "<li><a href='connexion.php'>Connexion</a></li>";
        } else {
            echo "<li><a href='profil.php'>Profil</a></li>";
            echo "<li><form action='#' method='post'><input type='submit' name='deco' value='deco'></form></li>";

        }
        if (isset($_POST['deco'])) {
            $ab = new User();
            $ab->disconnect();
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
