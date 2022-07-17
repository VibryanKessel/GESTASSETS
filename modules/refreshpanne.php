<?php 
$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";
$table="panne";//table dans laquelle chercher
$champ="commentaire";//champ de la table ou chercher
require("../conn.php");	
echo "<option selected></option>";

$req=$con->query("SELECT* FROM ".$table." ORDER BY ".$champ." ASC");
while ($rq=$req->fetch()) {
	if (!empty($rq[$champ])) echo "<option class=option>".$rq[$champ]."</option>";
}
 ?>
