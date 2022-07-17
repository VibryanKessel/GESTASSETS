<?php session_start(); ?>
<?php
 
$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";

require("../conn.php");
?>

<?php require "tables.php";?>


<?php 

$listliv=$con->query("SELECT* FROM ".$table6." WHERE MONTH(".$champ66.")=MONTH(CURDATE()) ORDER BY ".$champ66." ASC");

?>

<center class="titre fw-bold fs-3">LIVRAISONS DU MOIS</center>
<table class="table table-light table-hover">
	<th>FOURNISSEUR</th>
	<th>QUANTITE</th>
	<th>FRAIS</th>
	<th>RECEPTIONISTE</th>
	<th>DATE</th>

<?php 
while ($result=$listliv->fetch())
{
# ---------------------------Convertir id FOURNISSEUR en son libelle-----------------------------------------------------

	$fsseur=$con->query("SELECT* FROM ".$table4." WHERE ".$champ41."='".$result[$champ61]."'");
	$found=$fsseur->fetch();
	$lblfsseur=$found[$champ42];

?>
<tr>
	<td><?php echo $lblfsseur; ?></td>
	<td><?php echo $result[$champ63]; ?></td>
	<td><?php echo $result[$champ64]; ?></td>
	<td><?php echo $result[$champ65]; ?></td>
	<td><?php echo $result[$champ66]; ?></td>
</tr>

<?php
}
?>
</table>