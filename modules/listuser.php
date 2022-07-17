<?php
 
$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";

require("conn.php");
?>

<?php require "tables.php";?>

<?php 
echo '
<table class="tbluser table table-light table-hover table-responsive-md container">
		<center><header class="titre text-light fw-bold fs-3">LISTE DES UTILISATEURS</header></center>
		<tr>
			<th>'.$champ51.'</th>
			<th>'.$champ52.'</th>
			<th>'.$champ53.'</th>
			<th>'.$champ55.'</th>
			<th></th>
		</tr>';
?>

<?php 
	$searchuser=$con->query("SELECT * FROM ".$table5);
	while ($find=$searchuser->fetch()) 
	{
?>

	<tr>
<?php 
echo'
		<td>'.$find[$champ51].'</td>
		<td>'.$find[$champ52].'</td>
		<td>'.$find[$champ53].'</td>
		';
?>


	<?php 
	if ($find[$champ55]==1) {
	?>
<?php  
	echo '<th class="text-danger">ADMINISTRATEUR</th>';
	echo'
		<td><a disabled class="btn details text-light">Supprimer</a></td>
		';
		
?>
	<?php
		}else{
	?>		
<?php  
	echo '<td>AUTRE</td>';
	
	echo'
		<td><a class="btn details text-light" onclick=\'if(confirm("Etes-vous sur de vouloir supprimer l utilisateur '.$find[$champ52].'?"))window.location.assign("modules/deluser.php?'.$champ51.'='.$find[$champ51].'");\'>Supprimer</a>
		</td>
		';

?>
	<?php 
		}
	?>
		</tr>
	<?php
	}
	?>

<?php 

	echo'</table>';
?>
