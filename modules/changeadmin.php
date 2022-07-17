<?php
 
$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";

require("conn.php");
?>

<?php require "tables.php";?>





<?php 
// -- insertion du  user------------------------------------------------------------------- --

    $updmat=$_POST["updmat"];
    $updnom=$_POST["updnom"];
    $updprenom=$_POST["updprenom"];
    $updpw=$_POST["updmdp"];

if (strlen($updpw)>=8) {

    $exist=FALSE;

    $searchadmin=$con->query("SELECT * FROM ".$table5." WHERE ".$champ55."=1");
    while ($find=$searchadmin->fetch()) 
    {
        if($find[$champ51]==$updmat)$exist=TRUE;
    }
    if (!$exist) {

    $update_admin=$con->prepare("UPDATE ".$table5." SET ".$champ51."=?,".$champ52."=?,".$champ53."=?,".$champ54."=?"." WHERE ".$champ55."=?");
    $update_admin->execute(array($updmat,$updnom,$updprenom,$updpw,'1'));
?>

<?php 
echo '<div class="container bg-success msg fs-3 w-75">
    Le nouvel administrateur est desormais '.$updprenom.'  '.$updnom.', de matricule '.$updmat.'
</div>';
 ?>

<?php
}else{
?>

<?php 
echo '<div class="container bg-danger msg fs-3 w-75">
    Erreur!!.. Le matricule '.$updmat.' a deja ete enregistre
</div>';
 ?>

<?php
}
?>

<?php
}else{
?>

<?php 
echo '<div class="container bg-danger msg fs-3 w-75">
    Erreur!!..  le mot de passe est trop court
</div>';
 ?>

<?php   
}
 ?>
