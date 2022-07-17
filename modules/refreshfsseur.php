<?php 
$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";
$table="fournisseur";//table dans laquelle chercher
$champ="libelle";//champ de la table ou chercher
require("../conn.php");	
echo "<option selected>choisir un fournisseur</option>";

$req=$con->query("SELECT* FROM ".$table." ORDER BY ".$champ." ASC");
while ($rq=$req->fetch()) {
	if (!empty($rq[$champ])) echo "<option class=option>".$rq[$champ]."</option>";
}
 ?>
