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
if(!$superuserfound)header("location: ../signup/signup.php");

?>



<?php 
$table="utilisateurs";

$champ1="matricule";
$champ2="password";
$champ3="nom";
$champ4="prenom";
$champ5="role";
?>

<?php

if(!isset($_SESSION['id']))
{
?>

<!DOCTYPE html>
<html>
<head>

	<title>S'IDENTIFIER</title>
	<meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php include "../icon/addicon.php"; ?>

<link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="css/styleauthentification.css">
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../bootstrap-4.0.0-dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../bootstrap-5.0.0-dist/css/bootstrap.css">
<script src="../jquery/jquery-3.5.1.js"></script>
</head>
<body>	
	<form method="post">
		
<div class="ext container-fluid list-group vh-100 input-group col-12 ">

	<div class="extint container-fluid input-group-text h-75 w-50 input-group-sm">
		<div class="logo">
				<img src="../images/logo6.jpg">
		</div>
	<div class="container input-group-text int1">
		<div class="container-fluid col-3">
			
	<label  for="id">MATRICULE</label>
		</div>
	<div class="container-fluid w-75">
	<input type="text" name="id" id="id" autocomplete="off" maxlength="6" required class="form-control col-3">
	</div>
	</div>
	<div class="container input-group-text int2">
	<div class="container-fluid ">
		
	<label  for="mdp">MOT DE PASSE</label>
	</div>
	<div class="eye container-fluid w-75">
	<input type="password" name="mdp" id="mdp" required class="form-control col-3" onkeyup="verify()">
	<i class="fa fa-eye" id="eye" onclick="eye()" ></i>
	</div>	
	</div>
		<div class="container input-group-text int3">	
		<input type="submit" name="login" value="connexion" class=" btn fs-3 bouton">
		</div>
    </div>
	</div>
	</form>
 	<?php 
	if (isset($_POST["login"])) 
	{
		if (isset($_POST["id"],$_POST["mdp"]))
		{
			$id=$_POST["id"];
			$mdp=$_POST["mdp"];	
			$log_in=$con->query("SELECT* FROM ".$table);
			$userfound=FALSE;
			while ($login=$log_in->fetch()) {
				if(($login[$champ1]==$id)&&($login[$champ2]==$mdp))
				{
					$nom=$login[$champ3];
					$prenom=$login[$champ4];
					$role=$login[$champ5];
					$userfound=TRUE;
				}
			}
			if ($userfound) {
				$_SESSION["id"]=$id;
				$_SESSION["nom"]=$nom;
				$_SESSION["prenom"]=$prenom;
				$_SESSION["role"]=$role;
				header("location:../demarrage.php");
			}else{
				echo 
				'
				<script type="text/javascript">
					alert("ACCES REFUSE !!")
				</script>
				';
			}
		}
	}
	 ?>
</body>

<script type="text/javascript">
function eye()
{
	if (document.getElementById('mdp').type=="password") {
		document.getElementById('mdp').type="text";
		document.getElementById('eye').className="fa fa-eye-slash fa-3x";
		document.getElementById('eye').style.color="rgba(255,255,255,.7)";
		document.getElementById('eye').style.textShadow="5px 1px 5px rgba(0,0,0,.8)";
	}else{
	if (document.getElementById('mdp').type=="text") 
	{
		document.getElementById('eye').className="fa fa-eye fa-3x";
		document.getElementById('mdp').type="password";
		document.getElementById('eye').style.color="#000000";
		document.getElementById('eye').style.textShadow="5px 1px 5px rgba(0,0,0,0)";
	}
		}
}
</script>

<?php
}else{
	header('location:../accueil.php');
}
?>