<?php 

$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";
$table="assets";//table dans laquelle chercher
$champ1="code";//champ de la table ou chercher
$champ2="fournisseur";
$champ3="type";
$champ4="receptionniste";
$champ5="quantite_livree";
$champ6="frais";
$champ7="periode";
require("../conn.php");



	if (isset($_POST["search"])) 
	{

		if(!empty($_POST["search"]))
		{
echo "<div  class='boxresult container-fluid d-sm-bloc bg-light'>
<table  class='tablesearch vw-100 container-fluid table '>

	";
$search=$con->query("SELECT* FROM ".$table." WHERE ".$champ3." LIKE '".$_POST["search"]."%'");
if ($search!=FALSE) {

	if ($res=$search->fetch()) {
		echo '
<tr class="table-dark">
	<th class="">CODE DU MATERIEL</th>
	<th class="">FOURNISSEUR</th>
	<th class="">TYPE</th>
	<th class="">RECEPTIONNISTE</th>
	<th class="">QUANTITE</th>
	<th class="">FRAIS</th>
	<th class="">PERIODE</th>
	<th class=""></th>
	<th class=""></th>
</tr>

		<tr>
		<td class="">'.$res[$champ1].'</td>
		<td class="">'.$res[$champ2].'</td>
		<td class="">'.$res[$champ3].'</td>
		<td class="">'.$res[$champ4].'</td>
		<td class="">'.$res[$champ5].'</td>
		<td class="">'.$res[$champ6].'</td>
		<td class="">'.$res[$champ7].'</td>
		<td><a href="modules/Editionassets.php?'.$champ1.'='.$res[$champ1].'&?'.$champ2.'='.$res[$champ2].'&?'.$champ3.'='.$res[$champ3].'&?'.$champ4.'='.$res[$champ4].'&?'.$champ5.'='.$res[$champ5].'&?'.$champ6.'='.$res[$champ6].'&?'.$champ7.'='.$res[$champ7].'" class="btn btn-secondary">Modifier</a></td>
		<td><a onclick=\'if(confirm("Etes-vous sur de vouloir supprimer l asset '.$res[$champ1].'?"))window.location.assign("modules/Suppressionassets.php?'.$champ1.'='.$res[$champ1].'");\' class="btn btn-secondary">Supprimer</a></td>

		</tr>

';
		while ($res=$search->fetch()) {
		echo '
		<tr>
		<td class=" text-align-left">'.$res[$champ1].'</td>
		<td class=" text-align-left">'.$res[$champ2].'</td>
		<td class=" text-align-left">'.$res[$champ3].'</td>
		<td class=" text-align-left">'.$res[$champ4].'</td>
		<td class=" text-align-left">'.$res[$champ5].'</td>
		<td class=" text-align-left">'.$res[$champ6].'</td>
		<td class=" text-align-left">'.$res[$champ7].'</td>
		<td><a href="modules/Editionassets.php?'.$champ1.'='.$res[$champ1].'&'.$champ2.'='.$res2[$champ2].'&'.$champ3.'='.$res2[$champ3].'&'.$champ4.'='.$res2[$champ4].'&'.$champ5.'='.$res2[$champ5].'&'.$champ6.'='.$res2[$champ6].'&'.$champ7.'='.$res2[$champ7].'" class="btn btn-secondary">Modifier</a></td>
		<td><a onclick=\'if(confirm("Etes-vous sur de vouloir supprimer l asset '.$res[$champ1].'?"))window.location.assign("modules/Suppressionassets.php?'.$champ1.'='.$res[$champ1].'");\' class="btn btn-secondary">Supprimer</a></td>
		</tr>
';	
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
