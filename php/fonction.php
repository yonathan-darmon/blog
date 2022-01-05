<?php
function admin($get)
{

    if ($get== "user") {
        $entity = new User();
        $entityinfo = $entity->getAllInfo();
    }
    elseif ($get=="categories"){
        $entity = new Categorie();
        $entityinfo = $entity->getAllCatego();
    }
    elseif ($get=="articles"){
        $entity = new Article();
        $entityinfo = $entity->getAllArticle();
    }
    else{
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
            <select name="id" id="id">
                <?php
                for ($i = 0; $entityinfo[$i]; $i++) {
                    echo '<option value=' . $entityinfo[$i]['id'] . '>' . $entityinfo[$i]['id'] . '</option>';
                }


                ?>
            </select>
            <input type="submit" name="login" value="choix">

        </form>
        <?php
    }



?>