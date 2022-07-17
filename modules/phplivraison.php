<?php 
$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";

require("../conn.php");
?>


<?php require "tables.php"; ?>

<?php

$mat_reception=$_POST["mat_reception"];
$mdp_reception=$_POST["mdp_reception"];
$fsseur=$_POST["fsseur"];
$type=$_POST["type"];
$frais=$_POST["frais"];
$qte=$_POST["qte"];
$periode=$_POST["periode"];

?>

<?php 
$i=0;
?>
<?php 
$verifymat=$con->query("SELECT* FROM ".$table5." WHERE ".$champ51."='".$mat_reception."' AND ".$champ54."='".$mdp_reception."'");
?>

<?php

if ($check=$verifymat->fetch()) {

$infofsseur=$con->query("SELECT* FROM ".$table4." WHERE ".$champ42."="."'".$fsseur."'");
$result=$infofsseur->fetch();
$idfsseur=$result[$champ41];
// -- insertion de nouvelle livraison------------------------------------------------------------------- --

$insert_nvlivraison=$con->prepare("INSERT INTO ".$table6."(".$champ61.",".$champ63.",".$champ64.",".$champ65.",".$champ66.") VALUES(?,?,?,?,?)");
$insert_nvlivraison->execute(array($idfsseur,$qte,$frais,$mat_reception,$periode));

// -- ---------------------------------------------------------------------------------------- --
?>


<?php
// -- insertion d' un nouveau fournisseur------------------------------------------------------------------- --

$cherche=$con->query("SELECT* FROM ".$table4." WHERE ".$champ42."="."'".$fsseur."'");
if (!($exist=$cherche->fetch())) {

$insert_fsseur=$con->prepare("INSERT INTO ".$table4."(".$champ42.") VALUES(?)");
$insert_fsseur->execute(array($fsseur));

}

// -- ---------------------------------------------------------------------------------------- --
?>




<?php
// -- mise a jour du stock---------------------------------------------------------------------- --

$maj_stock=$con->prepare("UPDATE ".$table2.
									" SET ".$champ23."=((SELECT ".$champ23.")+".$qte.")".
									" WHERE ".
									$champ22."="."'".$type."'"
						);
$maj_stock->execute();

// -- -------------------------------------------------------------------------------------------------- -
?>


<?php
	$i=1;
}

echo $i;
	
 ?>