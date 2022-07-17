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


 	$asset=$con->query("SELECT * FROM ".$table1." GROUP BY ".$champ12);

?>
<center>	

<div id="tbmat">
	
    <table border="2" class="container-md table table-light table-bordered">
<div class="titre container-md text-uppercase text-center text-light fw-bold fs-lg-1 ">ETAT DU MATERIEL</div>
       <tr>
       		<th>ELEMENTS</th>
       		<th>DEFECTUEUX</th>
       		<th>EN PANNE</th>
       		<th>BONS</th>
       		<th>EN STOCK</th>
       		<th class="details"></th>
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
<?php 
	 	$cpninfo=$con->query("SELECT* FROM ".$table3.",".$table2.
    " WHERE ".$table2.".".$champ22."="."'".$result[$champ12]."'"." AND ".$table3.".".$champ32."=".$table2.".".$champ21);
	 	if ($cpnexist=$cpninfo->fetch()) {
			echo'<td><a title="Details" href="modules/details.php?type='.$result[$champ12].'" class="btn details text-light">details</a></td>';		
	 	}else
	 	{
			echo'<td><a disabled title="Aucun composant pour ce type" class="btn details text-light">details</a></td>';	
	 	}
?>
		</tr>
<?php } ?>
	</table>
</div>

</center>
