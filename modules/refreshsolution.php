<?php 
$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";
$table="resolutions_panne";//table dans laquelle chercher
$champ="solution";//champ de la table ou chercher
require("../conn.php");	
echo "<optgroup label='Selectionner une solution'>";
echo"<option></option>";
$req=$con->query("SELECT * FROM ".$table." GROUP BY ".$champ." ORDER BY ".$champ." ASC");
while ($rq=$req->fetch()) {
	if (!empty($rq[$champ])) echo "<option class=option>".$rq[$champ]."</option>";
}
echo"</optgroup>";
 ?>
