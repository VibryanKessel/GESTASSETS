<?php 
$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";

require("../conn.php");
?>


<?php require "tables.php"; ?>

<?php

$id=$_POST["id"];
$fsseur=$_POST["fsseur"];
$type=$_POST["type"];
$mat=$_POST["mat"];
$mdp=$_POST["mdp"];
$periode=$_POST["periode"];
$garantie=date_create($_POST["garantie"]);

?>

<?php 
$i=0;
?>
<?php 
$verifymat=$con->query("SELECT* FROM ".$table5." WHERE ".$champ51."='".$mat."' AND ".$champ54."='".$mdp."'");

$verifystock=$con->query("SELECT* FROM ".$table2." WHERE ".$champ22."='".$type."'");

$check=$verifystock->fetch();
?>

<?php
if ($check[$champ23]==0) {
	$i=2;	
}else{

if ($check=$verifymat->fetch()) {


// -- insertion de l'asset------------------------------------------------------------------- --

$insert_asset=$con->prepare("INSERT INTO ".$table1."(".$champ11.",".$champ12.",".$champ13.",".$champ14.",".$champ15.",".$champ16.",".$champ17.") VALUES(?,?,?,?,?,?,?)");
$insert_asset->execute(array($id,$type,$mat,$fsseur,'BON',$periode,date_format($garantie,"Y-m-d")));

// -- ---------------------------------------------------------------------------------------- --
?>




<?php
// -- mise a jour du stock de composants---------------------------------------------------------------------- --

$maj_stock=$con->prepare("UPDATE ".$table2.",".$table3.
									" SET ".$table3.".".$champ35."=((SELECT ".$table3.".".$champ35.")+1)".
									" WHERE ".
									$table2.".".$champ22."="."'".$type."'"." AND ".
									$table3.".".$champ32."=".$table2.".".$champ21
						);
$maj_stock->execute();

// -- -------------------------------------------------------------------------------------------------- -
?>


<?php
	$i=1;
}

}
echo $i;
	
 ?>