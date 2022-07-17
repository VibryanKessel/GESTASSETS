<?php 

$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";

require("../conn.php");
?>


<?php require "tables.php"; ?>

<?php

#++++++++++++++++++++++++++++++++++++++++++++++++++++++DECLARATION    DE    PANNE+++++++++++++++++++++++++++++++++++++++++




if(isset($_POST['mat_agent']))
{



$mat_agent=$_POST["mat_agent"];
$panne=$_POST["panne"];
$service=$_POST["service"];
$periode=$_POST["periode"];

?>

<?php
$verifymat=$con->query("SELECT* FROM ".$table11." WHERE ".$champ111."='".$mat_agent."'");

// -- Insertion de l'agent s'il n'existe pas ------------------------------------------------------------------- --

if (!($check=$verifymat->fetch()))
{

$insert_agent=$con->prepare("INSERT INTO ".$table11."(".$champ111.",".$champ112.") VALUES(?,?)");
$insert_agent->execute(array($mat_agent,$service));

}
// -- ---------------------------------------------------------------------------------------- --

?>

<?php
$verifypanne=$con->query("SELECT* FROM ".$table9." WHERE ".$champ92."=\"".$panne."\"");

// -- Insertion de la panne si elle est nouvelle ------------------------------------------------------------------- --

if (!($check=$verifypanne->fetch()))
{


$insert_panne=$con->prepare("INSERT INTO ".$table9."(".$champ92.") VALUES(?)");
$insert_panne->execute(array($panne));

}
// -- ---------------------------------------------------------------------------------------- --
$search=$con->query("SELECT* FROM ".$table9." WHERE ".$champ92."=\"".$panne."\"");
$find=$search->fetch();
$idpanne=$find[$champ91];

?>


<?php

// ------------Et enfin, insertion du nouveau cas de panne------------------------------------------------------

$upd_statut_panne=$con->prepare("INSERT INTO ".$table10."(".$champ101.",".$champ102.",".$champ103.",".$champ104.") VALUES(?,?,?,?)");
$upd_statut_panne->execute(array($mat_agent,$idpanne,'NON RESOLU',$periode));

#--------------------------------------------------------------------


?>

<?php 
}

#++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
?>



<?php 
#+++++++++++++++++++++++++++++RESOLUTION    DE    PANNE+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

if (isset($_POST['mat_it'])) 
{
$i=1;



$mat_it=$_POST["mat_it"];
$idpanne=$_POST["idpanne"];
$idcas=$_POST["idcas"];
$solution=$_POST["solution"];

?>

<?php
$verifymat=$con->query("SELECT* FROM ".$table5." WHERE ".$champ51."='".$mat_it."'");

// -- Verification du matricule IT ------------------------------------------------------------------- --

if ($check=$verifymat->fetch())
{

?>

<?php
// -- Insertion  de  la  resolution ------------------------------------------------------------------- --

$insertsol=$con->prepare("INSERT INTO ".$table8."(".$champ81.",".$champ82.",".$champ83.",".$champ84.",".$champ85.") VALUES(?,?,?,?,?)");
$insertsol->execute(array($mat_it,$idpanne,date('Y-m-d'),$solution,$idcas));
// -----------------------------------------------------------------------------------------------------------


// ------------Changer le statut du cas de panne------------------------------------------------------

$upd_statut_panne=$con->prepare("UPDATE ".$table10." SET ".$champ103."=? WHERE ".$champ105."=?");
$upd_statut_panne->execute(array('RESOLU',$idcas));

#--------------------------------------------------------------------

}else{
	$i=0;
}

echo $i;
}

#++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
?>