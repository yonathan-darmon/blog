<nav class="header">
    <ul class="main">
        <img class="logo" src="http://localhost/blog/blog/asset/IMAGE/la-rams-logo-1.png" alt="">
        <li><a href="http://localhost/blog/blog/index.php">Accueil</a></li>

        <li class="dropdown"><a href="http://localhost/blog/blog/php/articles.php?start=0&categorie=0">Articles</a>


            <ul class="dropdown-content">
                <?php
                $catego = new Categorie();
                $cat = $catego->getcatego();
                for ($i = 0; isset($cat["$i"]); $i++) {
                    echo '<li><a href="http://localhost/blog/blog/php/articles.php?start=0&categorie=' . $cat["$i"]['id'] . '">' . $cat["$i"]['nom'] . '</a>';
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


        }
        if (isset($_POST['deco'])) {
            $ab = new User();
            $ab->disconnect();
        }
        if (isset($_SESSION['droits'])) {
            if ($_SESSION['droits'] == 42 || $_SESSION['droits'] == 1337) {
                echo "<li><a href='http://localhost/blog/blog/php/creer-article.php'>Créer un article</a></li>";
            }
            if ($_SESSION['droits'] == 1337) {
                echo "<li><a href='http://localhost/blog/blog/php/admin.php'>Page Admin</a></li>";

            }
            echo "<li><form action='#' method='post' class='deco'><input type='submit' id='deco' name='deco' value='Deconnexion'></form></li>";
        }
        ?>

    </ul>
</nav>
