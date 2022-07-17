<?php 
session_start();
 ?> 
<?php 
$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";

require("conn.php");
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
if (!isset($_SESSION["id"])) header("location:portail/authentification.php");
 ?>



<?php 
$table="assets";//table dans laquelle chercher
$champ1="code";//champ de la table ou chercher
$champ2="fournisseur";
$champ3="type";
$champ4="receptionniste";
$champ5="quantite_livree";
$champ6="frais";
$champ7="periode";
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-dist/css/bootstrap.css">
    <script src="bootstrap-5.0.0-dist/js/bootstrap.js"></script>
<script src="jquery/jquery-3.5.1.js"></script>
</head>
<body>
<style type="text/css">
*{
    text-align: center;
 }

 body
 {
    background-image: url('images/logo5.png');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: top;
 }

td{
    height: 3vh;
    font-size: .75em;
 }
 th
 {
    height: 3vh;
    font-size: 1em;

 }
</style>
<?php require "modules/tables.php"; ?>

<?php 

 	$asset=$con->query("SELECT * FROM ".$table1." GROUP BY ".$champ12);

?>
    <table border="2" class="container-md table table-light table-bordered">
<div class="bg-dark container-md text-uppercase text-light text-center fw-bold fs-lg-1 ">ETAT DU MATERIEL</div>
       <tr>
       		<th>ELEMENTS</th>
       		<th>DEFECTUEUX</th>
       		<th>EN PANNE</th>
       		<th>BONS</th>
       		<th>EN STOCK</th>
       </tr>
       
<?php 
while($result=$asset->fetch())
{
 	$d=$con->query("SELECT COUNT(".$champ11.") AS nbre_d FROM ".$table1." WHERE ".$champ12."='".$result[$champ12]."' AND ".$champ15."='DEFECTUEUX'");
 	$nbd=$d->fetch();
 	$p=$con->query("SELECT COUNT(".$champ11.") AS nbre_p FROM ".$table1." WHERE ".$champ12."='".$result[$champ12]."' AND ".$champ15."='EN PANNE'");
 	$nbp=$p->fetch();
 	$b=$con->query("SELECT COUNT(".$champ11.") AS nbre_b FROM ".$table1." WHERE ".$champ12."='".$result[$champ12]."' AND ".$champ15."='BON'");
 	$nbb=$b->fetch(); 
 	$s=$con->query("SELECT *  FROM ".$table2." WHERE ".$champ22."='".$result[$champ12]."'");
 	$nbs=$s->fetch();
?>
		<tr>
			<th style="text-transform: uppercase;"><?php echo $result[$champ12]; ?></th>			
			<td><?php echo $nbd["nbre_d"]; ?></td>			
			<td><?php echo $nbp["nbre_p"]; ?></td>			
			<td><?php echo $nbb["nbre_b"]; ?></td>		
			<td><?php echo $nbs[$champ23]; ?></td>		

<?php } ?>