<?php 
$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";

require("conn.php"); 
 ?>




<?php 
$table="utilisateurs";

$champ1="matricule";
$champ2="password";
$champ3="nom";
$champ4="prenom";
$champ5="role";
?>
<!DOCTYPE html>

<html>
<head>
 
	<title>SIGN UP</title>
	<meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<?php include "../icon/addicon.php"; ?>

<link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="css/stylesignup.css">
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../bootstrap-4.0.0-dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../bootstrap-5.0.0-dist/css/bootstrap.css">
<script src="../jquery/jquery-3.5.1.js"></script>
</head>
<body>	

	<form method="post">
		
<div class="ext container-fluid list-group vh-100 input-group col-12 ">
	<center>
	<header><u>ENREGISTRER LE SUPER-UTILISATEUR</u></header>
	</center>
	<div class="extint container-fluid input-group-text h-75 w-50 input-group-sm">
	<div class="logo">
	<img class="container-fluid" src="images/logo6.jpg">
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
		<div class="container-fluid col-3">
			
	<label  for="nom">NOMS</label>
		</div>
	<div class="container-fluid w-75">
	<input type="text" name="nom" id="nom" autocomplete="off" required class="form-control col-3">
	</div>
	</div>
	<div class="container input-group-text int3">
		<div class="container-fluid col-3">
			
	<label  for="prenom">PRENOMS</label>
		</div>
	<div class="container-fluid w-75">
	<input type="text" name="prenom" id="prenom" autocomplete="off"  required class="form-control col-3">
	</div>
    </div>
	<div class="container input-group-text int4">
	<div>
	<label  for="mdp">MOT DE PASSE</label>
	</div>
	<div class="eye container-fluid w-75">
	<input type="password" name="mdp" id="mdp" required class="form-control col-3" onkeyup="verify()">
	<i class="fa fa-eye" id="eye" onclick="eye()" ></i>
	</div>	
	</div>
		<div class="container input-group-text int5">	
		<input type="submit" name="signup" class=" btn btn-dark">
		</div>
	</form>
 	<?php 

	if (isset($_POST["signup"])) 
	{
		if (isset($_POST["id"],$_POST["mdp"],$_POST["nom"],$_POST["prenom"]))
		{
			if (strlen($_POST["mdp"])<8)
			{
						echo 
						'
<script type="text/javascript">
	alert("Le mot de passe n\'est pas assez securise")
</script>
						';
			}else{
				$id=$_POST["id"];
				$mdp=$_POST["mdp"];	
				$nom=$_POST["nom"];
				$prenom=$_POST["prenom"];
				$role=1;
				$sign_in=$con->prepare("INSERT INTO ".$table." (".$champ1.",".$champ2.",".$champ3.",".$champ4.",".$champ5.") VALUES(?,?,?,?,?)");
				$sign_in->execute(array($id,$mdp,$nom,$prenom,$role));

				header("location:demarrage.php");
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
function verify()
{
	if(document.getElementById("mdp").value.length<8)
	{
		document.getElementById('mdp').style.color='red'
	}else{
		document.getElementById('mdp').style.color='green'
	}
}
</script>