<?php 
$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";
$table="type_asset";//table dans laquelle chercher
$champ="nom";//champ de la table ou chercher
require("../conn.php");	
echo "<option>choisir un type d' asset</option>";

$req=$con->query("SELECT* FROM ".$table." ORDER BY ".$champ." ASC");
while ($rq=$req->fetch()) {
	if (!empty($rq[$champ])) echo "<option class=option>".$rq[$champ]."</option>";
}
 ?>
