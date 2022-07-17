<?php 
$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";
?>

<?php
$table="composants";
$champ1="num_composant";
$champ2="ref_type";
$champ3="libelle";

$tableref="type_asset";
$champref1="numero";
$champref2="nom";

require("../conn.php");
?>


<?php 

$nv=$_POST["nvcpn"];

$req=$con->query("SELECT MAX(".$champref1.") AS MAX FROM ".$tableref);
	$rq=$req->fetch();
	$numtyperef=$rq["MAX"];

$req2=$con->query("SELECT * FROM ".$tableref." WHERE ".$champref1."='".$numtyperef."'");
	$rq=$req2->fetch();
	$typeref=$rq[$champref2];



$count=$con->query("SELECT COUNT(".$champ1.") AS MAX FROM ".$table." WHERE ".$champ2."='".$numtyperef."'");
	$m=$count->fetch();
	$max=$m["MAX"];


$numcpn=$typeref;
	$numcpn.="_c".($max+1);
$r=$con->query("SELECT* FROM ".$table);

$exist=TRUE;
while($res=$r->fetch())
{
	if ($res[$champ3]==$nv)$exist=FALSE;
}
	if($exist)
	{
	$req=$con->prepare("INSERT INTO ".$table."(".$champ1.",".$champ2.",".$champ3.") VALUES(?,?,?)");
	$req->execute(array($numcpn,$numtyperef,$nv));
	echo 
	'
	 <script type="text/javascript">
 	                 alert("Element \'"+cpn+"\' enregistre")
                 if(confirm("Ajouter un autre composant ?"))window.location.reload()
	 </script>	
	';
	}else{
		echo
			'
	  <script type="text/javascript">
                 alert("Echec de l\' operation")
                 if(continu=confirm("Ajouter un autre composant ?"))window.location.reload()
 	  </script>
			';
	}
 ?>
