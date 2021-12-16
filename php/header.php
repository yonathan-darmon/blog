<?php
session_start();
var_dump($_SESSION);
require "classe_article.php";
require "classes-categorie.php";
require "classes_user.php";
?>
<nav>
    <ul>
        <li><a href="#">Accueil</a></li>

        <li>Articles
            <ul class="dropdown">
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
        if (!isset($_SESSION)) {
            echo "<li><a href='#'>Inscritpion</a></li>";
            echo "<li><a href='#'>Connexion</a></li>";
        }
        else{
            echo "<li><a href='#'>Profil</a></li>";
            echo "<li><input type='submit' name='deco' value='deco'></li>";

        }

        ?>

        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
    </ul>
</nav>
