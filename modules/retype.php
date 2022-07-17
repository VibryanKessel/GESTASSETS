<?php 
$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";

?>


<?php
$table1="type_asset";//table dans laquelle chercher
$champ11="numero";
$champ12="nom";//champ de la table ou chercher

$table2="composants";
$champ21="num_composant";
$champ22="ref_type";
$champ23="libelle";

require("../conn.php");
?>

<?php
if (isset($_POST["retype"])) {
$re=$_POST["retype"];
$w=$v=$i=0;


	$req=$con->query("SELECT* FROM ".$table1." WHERE ".$champ12."='".$re."'");
	$res=$req->fetch();
	$numero=$res[$champ11];	

// recherche du numero dans table1
	$req=$con->prepare("DELETE FROM ".$table1." WHERE ".$champ12."=?");
	$req->execute(array($re));

// suppression dans table1

$req=$con->query("SELECT* FROM ".$table1);
while ($rq=$req->fetch()) {
	if($rq[$champ12]==$re)$i++;
}
	if($i==0)
	{

	$req2=$con->prepare("DELETE FROM ".$table2." WHERE ".$champ22."=?");
	$req2->execute(array($numero));

	// suppression dans la table2

	$req=$con->query("SELECT* FROM ".$table2." WHERE ".$champ22."='".$numero."'");
	while ($rq=$req->fetch()) {
	$v++;
	}	

	$req=$con->query("SELECT* FROM ".$table1." WHERE ".$champ11."='".$numero."'");
	while ($rq=$req->fetch()) {
	$w++;
	}
	if ($v==0&&$w==0)
	{
	 echo 
	 	'
 		<script type="text/javascript">
       	alert("L\' asset \''.$re.'\' a bien ete supprime");
 		</script>

	 	'
	 	;
	}else{
	  echo 
	 	'
 		<script type="text/javascript">
       	alert("Erreur");
 		</script>

	 	';
	}	
	}else{
		echo 
			'
		<script type="text/javascript">
       	alert("Le type d\'asset n\'existe plus");
 		</script>

			';
	}
}
 ?>
 	
