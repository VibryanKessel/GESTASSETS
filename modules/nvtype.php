<?php 
$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";
$table="type_asset";//table dans laquelle chercher
$champ="nom";//champ de la table ou chercher
require("../conn.php");

if (isset($_POST["nvtype"])) {
$nv=$_POST["nvtype"];
$i=0;

$req=$con->query("SELECT* FROM ".$table);
while ($rq=$req->fetch()) {
	if($rq[$champ]==$nv)$i++;
}

	if($i==0)
	{
	$req=$con->prepare("INSERT INTO ".$table."(".$champ.") VALUES(?)");
	$req->execute(array($nv));
		echo "success";
	}
	
}

 ?>