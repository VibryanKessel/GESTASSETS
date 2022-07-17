<?php 
$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";

require("../conn.php");
?>

<?php require "tables.php";?>

<?php

$req=$con->prepare("DELETE FROM ".$table1." WHERE ".$champ11."=?");
$req->execute(array($_GET[$champ11]));

$maj_stock=$con->prepare("UPDATE ".$table2.",".$table3.
									" SET ".$table3.".".$old."=((SELECT ".$table3.".".$old.")-1)".
									" WHERE ".
									$table2.".".$champ22."="."'".$_GET[$champ14]."'"." AND ".
									$table3.".".$champ32."=".$table2.".".$champ21
						);
$maj_stock->execute();

header("location:../assets.php");
 ?>