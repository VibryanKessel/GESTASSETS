<?php 
$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";

require("../conn.php");
?>

<?php require "tables.php";?>

<?php

$req=$con->prepare("DELETE FROM ".$table5." WHERE ".$champ51."=?");
$req->execute(array($_GET[$champ51]));

header("location:../users.php");
?>