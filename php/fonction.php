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
    <div class="box2">
    <form action="#" method="post" class="modif">
    <?php
     if (isset($_POST['update']) && isset($_SESSION['id_select']) && isset($_POST['active'])){
                    $user=new User();
                    $userinfo=$user->getAllInfoById($_SESSION['id_select']);
                    var_dump($userinfo);

                        error_log("BLOP BLOP",0,'.\php_error.log');
                        var_dump($_SESSION['id_select']);
                        var_dump($_POST['id_droits']);
                        var_dump($_POST['active']);

                        $user->updateAdmin($_SESSION['id_select'], $userinfo[0]['id_droits'], $_POST['active']);
                }
    if (isset($_POST['login'])) {
        if (isset($_POST['id_select'])){
        if(isset($_SESSION['id_select'])){
            unset($_SESSION['id_select']);
        }
        $_SESSION['id_select']=$_POST['id_select'];
        }
        $droits = new Droits();
        $droits1 = $droits->getDroits();
        if ($_GET['modification'] == "user" && isset($entitycontent)) {
            foreach ($entitycontent as $key => $value) {
                echo "<label for='login' >Login</label>";
                echo "<input name='login' type='text' value='$value[login]' readonly>";
                echo "<label for='id_droits'>Droits</label>";
                echo "<select name='id_droits'>";

                for ($i = 0; isset($droits1[$i]); $i++) {

                    echo '<option value=' . $droits1[$i]['nom'] . '>' . $droits1[$i]['nom'] . '</option>';
                }
                echo "</select>";
                echo "<label for='active'> Utilisateurs actif</label>";
                echo "<select name='active'>";
                echo "<option value='0'> Actif</option>";
                echo "<option value='1'> Inactif</option>";
                echo "</select>";
                echo "<input type='submit' name='update' value='modifier'>";
                echo "</form>";
                var_dump($_POST);
                error_log(implode("|",$_POST),0,'.\php_error.log');
            }



        ?>
        <div class="text">
            <ul>Rappel des Regles:
                <li>Un user active 1 signifie qu'il ne peut plus poster sur le site et son mdp sera supprimé</li>
            </ul>
        </div>

        </div>
        <?php
    }

}


}

?>