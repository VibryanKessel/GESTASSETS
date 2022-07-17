<?php session_start(); ?>

<?php 

$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";

require("../conn.php");
?>



<?php
require "../modules/tables.php";
?>

<?php

	if (isset($_POST["search"])) 
	{

		if(!empty($_POST["search"]))
		{
echo "<div  class='boxresult container-fluid d-sm-bloc bg-light'>
<table  class='tablesearch vw-100 container-fluid table '>

	";
$search=$con->query("SELECT* FROM ".$table1." WHERE ".$champ11." LIKE '%".$_POST["search"]."%'");
if ($search!=FALSE) {

	if ($res=$search->fetch()) {
		echo '
<tr class="table-dark">
	<th class="">CODE DU MATERIEL</th>
	<th class="">TYPE</th>
	<th class="">RECEPTIONNISTE</th>
	<th class="">FOURNISSEUR</th>
	<th class="">ETAT</th>
	<th class="">PERIODE</th>
	<th class="">GARANTIE</th>
	<th class=""></th>
	<th class=""></th>';
if ($_SESSION["role"]==1) 
	echo '<th class=""></th>';
	echo'</tr>
		<tr>
		<td class="">'.$res[$champ11].'</td>
		<td class="">'.$res[$champ12].'</td>
		<td class="">'.$res[$champ13].'</td>
		<td class="">'.$res[$champ14].'</td>
		<td class="">'.$res[$champ15].'</td>
		<td class="">'.$res[$champ16].'</td>
		<td class="">'.$res[$champ17].'</td>
		';
		if ($_SESSION["role"]==1) {
            echo'
        <td><a href="modules/Editionassets.php?'.$champ11.'='.$res[$champ11].'&'.$champ12.'='.$res[$champ12].'&'.$champ13.'='.$res[$champ13].'&'.$champ14.'='.$res[$champ14].'&'.$champ15.'='.$res[$champ15].'&'.$champ16.'="'.$res[$champ16].'" class="btn btn-secondary">Modifier</a>
        <a onclick=\'if(confirm("Etes-vous sur de vouloir supprimer l asset '.$res[$champ11].'?"))window.location.assign("modules/Suppressionassets.php?'.$champ11.'='.$res[$champ11].'");\' class="btn btn-secondary">Supprimer</a></td>
            </tr>';
    }else{
        echo'
        <td><a href="modules/Editionassets.php?'.$champ11.'='.$res[$champ11].'&'.$champ12.'='.$res[$champ12].'&'.$champ13.'='.$res[$champ13].'&'.$champ14.'='.$res[$champ14].'&'.$champ15.'='.$res[$champ15].'&'.$champ16.'='.$res[$champ16].'&'.$champ17.'='.$res[$champ17].'" class="btn btn-secondary">Modifier</a>
        </td>
        </tr>';
    }
		while ($res=$search->fetch()) {
		echo '
		<tr>
		<td class=" text-align-left">'.$res[$champ11].'</td>
		<td class=" text-align-left">'.$res[$champ12].'</td>
		<td class=" text-align-left">'.$res[$champ13].'</td>
		<td class=" text-align-left">'.$res[$champ14].'</td>
		<td class=" text-align-left">'.$res[$champ15].'</td>
		<td class=" text-align-left">'.$res[$champ16].'</td>
		<td class=" text-align-left">'.$res[$champ17].'</td>
		';
if ($_SESSION["role"]==1) {
            echo'
        <td><a href="modules/Editionassets.php?'.$champ11.'='.$res[$champ11].'&'.$champ12.'='.$res[$champ12].'&'.$champ13.'='.$res[$champ13].'&'.$champ14.'='.$res[$champ14].'&'.$champ15.'='.$res[$champ15].'&'.$champ16.'="'.$res[$champ16].'" class="btn btn-secondary">Modifier</a></td>
        <td><a onclick=\'if(confirm("Etes-vous sur de vouloir supprimer l asset '.$res[$champ11].'?"))window.location.assign("modules/Suppressionassets.php?'.$champ11.'='.$res[$champ11].'");\' class="btn btn-secondary">Supprimer</a></td>
            </tr>';
    }else{
        echo'
        <td><a href="modules/Editionassets.php?'.$champ11.'='.$res[$champ11].'&'.$champ12.'='.$res[$champ12].'&'.$champ13.'='.$res[$champ13].'&'.$champ14.'='.$res[$champ14].'&'.$champ15.'='.$res[$champ15].'&'.$champ16.'="'.$res[$champ16].'" class="btn btn-secondary">Modifier</a>
        </td>
        </tr>';
    }	
	}
	echo '</table>
		</div>
		<br>	
<input value="Enregistrer un asset" class="btn1 button" type="submit" name="ajouter">
            <input value="Retirer un asset" class="btn2 button" type="submit" name="retirer">
            <input value="Modifier un asset" class="btn3 button" type="submit" name="modifier">';
	}else{
		if ($_POST["search"]=='"') {

		echo '<tr><td>Aucun resultat ne correspond a " '.$_POST["search"].' "</td></tr>
				</table>
				</div>';
		}else{
			if ($_POST["search"]=="'") {
			echo "<tr><td>Aucun resultat ne correspond a ' ".$_POST["search"]." '</td></tr>
			</table>
			</div>";	
			}else{
				echo "<tr><td>Aucun resultat ne correspond a ' ".$_POST["search"]." '</td></tr>
				</table>
				</div>";
			}
		}
	}


}else{

		echo '<tr><td>Aucun resultat ne correspond a " '.$_POST["search"].' "</td></tr>';


}
}
}
?>
