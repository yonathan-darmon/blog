<?php
function admin($get)
{
    if (isset($_POST['delete'])){
        
    }
     if (isset($_POST['update']) && isset($_SESSION['id_select'])){
         		if ($_GET['modification'] == "user" && isset($_POST['active'])) {

					$user=new User();
					$userinfo=$user->getAllInfoById($_SESSION['id_select']);
						$user->updateAdmin($_SESSION['id_select'], $userinfo[0]['id_droits'], $_POST['active']);
                                             header("Refresh:3, URL=admin.php");

                 }
                 elseif ($_GET['modification']== "articles" && isset($_POST['categorie'])) {
                     $article2=new Article();
                     $text=$_POST['titre'].'/'. $_POST['corp'];
                     $catego=new Categorie();
                     $cat2=$catego->getCategoByName($_POST['categorie']);
                     $article2->update($text,$cat2['id'],$_POST['enligne'],$_SESSION['id_select']);
                     header("Refresh:3, URL=admin.php");

                 }elseif ($_GET['modification']== "commentaire" && isset($_POST['corp'])) {
                     $update=new Commentaire();
                     $text=$_POST['titre'].'/'. $_POST['corp'];
                     $update->updateAdmin($text,$_SESSION['id_select']);
                     header("Refresh:3, URL=admin.php");
                     }
     }

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
        }
        elseif ($get == "commentaire"){
            $entity=new Commentaire();
            $entityinfo=$entity->getAllCom();
            if (isset($_POST['id_select'])){
                $entitycontent=$entity->getComById($_POST['id_select']);
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
           echo"<form action='#' method='post' class='modif'>";

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
				error_log(implode("|",$_POST),0,'.\php_error.log');
			}



		?>
		<div class="text">
			<ul>Rappel des Regles:
				<li>Un user active 1 signifie qu'il ne peut plus poster sur le site et son mdp sera supprimé</li>
			</ul>
		</div>

		<?php
	}
		elseif ($_GET['modification']== "articles" && isset($entitycontent)) {
           echo"<form action='#' method='post' class='modif'>";
            			foreach ($entitycontent as $key => $value) {
                            $article = explode('/', $value['article']);
                            echo "<label for='titre'>Titre de l'article</label>";
                            echo "<input type='text' name='titre' value='$article[0]'>";
                            echo "<label for='corp'> Corp de l'article</label>";
                            echo "<textarea name='corp' cols='5' rows='5'>$article[1]</textarea>";
                            echo "<label for='categorie'> Choix de la catégorie</label>";
                            $categorie=new Categorie();
                           $cat=$categorie->getAllCatego();
                            echo "<select name='categorie'>";
                            for ($i=0;isset($cat[$i]);$i++){
                                echo'<option value='.$cat[$i]['nom'].'>'.$cat[$i]['nom'].'</option>';


                            }
                            echo "</select>";

                            echo "<label for='enligne'>Article en ligne</label>";
                            echo "<select name='enligne'>";
				            echo "<option value='0'> En ligne</option>";
                            echo "<option value='1'> Hors ligne</option>";
				            echo "</select>";
                            echo "<input type='submit' name='update' value='modifier'>";
                            echo "</form>";
                        }


		}
        elseif ($_GET['modification']== "commentaire" && isset($entitycontent)) {
                        echo"<form action='#' method='post' class='modif'>";
                        foreach ($entitycontent as $key => $value) {
                            $comment=explode('/', $value['commentaire']);
                            echo "<label for='titre'>Titre du commentaire</label>";
                            echo "<input type='text' name='titre' value='$comment[0]'>";
                            echo "<label for='corp'> Corp du commentaire</label>";
                            echo "<textarea name='corp' cols='5' rows='5'>$comment[1]</textarea>";
                            echo "<input type='submit' name='update' value='modifier'>";
                            echo "<input type='submit' name='delete' value='Supprimer le commentaire'>";
                            echo "</form>";
                            }
                            echo "<div class='displayarticle'>";
                            echo "<p> Ce commentaire correspond à l'article suivant:</p>";
                            $article=new Article();
                            $art=$article->getArticleById($value['id_article']);
                            $article2=explode('/',$art['article']);
                            echo "<h1>$article2[0]</h1>";
                            echo "<p>$article2[1]</p>";
                            echo "</div>";


        }

	}
    echo "</div>";
}

?>