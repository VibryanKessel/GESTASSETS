<?php session_start(); ?>
<?php
 
$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";

require("../conn.php");
?>

<?php 
$table="utilisateurs";
$champ1="matricule";//champ de la table ou chercher
$champ2="nom";
$champ3="prenom";
$champ4="password";
$champ5="role";

$searchsuperuser=$con->query("SELECT* FROM ".$table);

$superuserfound=FALSE;
while($result=$searchsuperuser->fetch())
{
    if ($result[$champ5]==1) $superuserfound=TRUE;
}
if(!$superuserfound)header("location: signup/signup.php");
 ?>



<?php 
if (!isset($_SESSION["id"])) {
    header("location:portail/authentification.php");
}
 ?>

<?php 
$table1="assets";//table dans laquelle chercher
$champ11="code";//champ de la table ou chercher
$champ12="frais";
$champ13="quantite_livree";
$champ14="type";
$champ15="fournisseur";
$champ16="receptionniste";
$champ17="periode";

?>

<?php 
$table2="composants";//table dans laquelle chercher
$champ21="num_composant";//champ de la table ou chercher
$champ22="ref_type";
$champ23="libelle";
$champ24="etat";

 ?>


<!DOCTYPE html>
<html>
<head>
    <title>ETATS</title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../css/styledetails.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.0.0-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.0.0-dist/css/bootstrap.css">
    <script src="../bootstrap-5.0.0-dist/js/bootstrap.js"></script>
    <script src="../jquery/jquery-3.5.1.js"></script>
</head>

<div class="bg-dark vw-100">
<?php require "tables.php";?>

<a href="../tbmat.php" class="btn titre text-light fixed-top">REVENIR</a>
<br><br><br>
<?php 


 	$cpninfo=$con->query("SELECT* FROM ".$table3.",".$table2.
    " WHERE ".$table2.".".$champ22."="."'".$_GET['type']."'"." AND ".$table3.".".$champ32."=".$table2.".".$champ21);

?>
<div class="table-details">

<table border="2" class=" container-md table table-light">
<div class="container-md titre text-light text-uppercase text-center fw-bold fs-lg-1 ">ETAT</div>
       <tr>
       		<th>COMPOSANTS</th>
       		<th>DEFECTUEUX</th>
       		<th>BON</th>
       		<th>EN PANNE</th>
       </tr>
<?php 
while($result=$cpninfo->fetch())
{
?>
		<tr>
			<th style="text-transform: uppercase;"><?php echo $result[$champ33]; ?></th>			
			<td><?php echo $result[$champ34]; ?></td>			
			<td><?php echo $result[$champ35]; ?></td>			
			<td><?php echo $result[$champ36]; ?></td>		
		</tr>
<?php } ?>
</div>
</div>