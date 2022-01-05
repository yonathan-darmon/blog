<?php
function admin($get)
{

    if ($get == "user") {
        $entity = new User();
        $entityinfo = $entity->getAllInfo();
        if (isset($_POST['id_select'])) {
            $entitycontent = $entity->getAllInfoById($_POST['id_select']);
        }
    } elseif ($get == "categories") {
        $entity = new Categorie();
        $entityinfo = $entity->getAllCatego();
        if (isset($_POST['id_select'])) {
            $entitycontent = $entity->getAllInfoById($_POST['id_select']);
        }
    } elseif ($get == "articles") {
        $entity = new Article();
        $entityinfo = $entity->getAllArticle();
        if (isset($_POST['id_select'])) {
            $entitycontent = $entity->getAllInfoById($_POST['id_select']);
        }
    } else {
        die();
    }
    echo "<table class='$get'>";

    echo "<tr>";
    foreach ($entityinfo as $key) {
        foreach ($key as $value => $value2) {
            echo "<th>$value</th>";
        }
        break;
    }

    echo "</tr>";
    foreach ($entityinfo as $key) {
        echo "<tr>";
        foreach ($key as $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }


    echo "</table>";
    ?>
    <form action="#" method="post">
        <select name="id_select" id="id_select">
            <?php
            for ($i = 0; $entityinfo[$i]; $i++) {
                echo '<option value=' . $entityinfo[$i]['id'] . '>' . $entityinfo[$i]['id'] . '</option>';
            }


            ?>
        </select>
        <input type="submit" name="login" value="choix">

    </form>
    <form action="#" method="post" class="modif">
        <?php
        if (isset($_POST['login'])) {
            if ($_GET['modification'] == "user") {
                var_dump($entityinfo);
                foreach ($entitycontent as $key => $value) {
                    echo "<label for='login' >Login</label>";
                    echo "<input name='login' type='text' value='$value[login]'>";
                    echo "<label for='id_droits'>Droits</label>";
                    echo "<select name='id_droits'>";
                    for ($i=0;isset($entityinfo[$i]);$i++){

                        echo "<option value='$entityinfo[$i][id_droits]'>$entityinfo[$i][id_droits]</option>";
                    }
                    echo "<input type='submit' name='update' value='modifier'>";

                }
            } else {
                echo "";
            }


        }
        ?>
    </form>
    <?php

}


?>