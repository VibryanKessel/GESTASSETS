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

<?php  require "modules/tables.php";?>

<?php 

$searchsuperuser=$con->query("SELECT* FROM ".$table5);

$superuserfound=FALSE;
while($result=$searchsuperuser->fetch())
{
    if ($result[$champ55]==1) $superuserfound=TRUE;
}
if(!$superuserfound)header("location: signup/signup.php");
 ?>



<?php 
if (!isset($_SESSION["id"])) {
    header("location:portail/authentification.php");
}
 ?>
<?php require "modules/tables.php";?>


<!DOCTYPE html>
<html>
<head>
    <title>GESTION DES UTILISATEURS</title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/ico" href="icon/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/styleusers.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-dist/css/bootstrap.css">
    <script src="bootstrap-5.0.0-dist/js/bootstrap.js"></script>
    <script src="jquery/jquery-3.5.1.js"></script>
</head>
<?php 
	if ($_SESSION["role"]!=1) 
	{
?>
<body class="container-fluid">
	
<?php require "modules/navbar.php"; ?>



<div class="lockdiv container bg-light w-25">
	<center>
	<i class="fa fa-lock fa-5x"></i><center>ACCES INTERDIT</center>
	</center>
</div>
</body>

<?php 
}else{
?>
<body class="container"  style="background-image: url('images/bg.jpg');">


<?php require "modules/navbar.php"; ?>


<div class="btnnavdiv fixed-top">
	<label><i class="fa fa-arrow-up "></i></label>
	<label for="c1" class="btnnav b1" ></label>
	<label for="c2" class="btnnav b2"></label>
	<label for="c3" class="btnnav b3"></label>
	<label><i class="fa fa-arrow-down "></i></label>
</div>

<input type="radio" id="c1" checked name="radio">
<input type="radio" id="c2" name="radio">
<input type="radio" id="c3" name="radio">

<!-- ---------------------Enregistrer un user------------------------------------------------------ -->

<div class=" enregistrer container">

<div class="extext container">

<br><br>
<form method="post">
	<center class="titre fw-bold fs-3 container w-75">AJOUTER UN UTILISATEUR</center>

<div class="blockext container w-75">	

	<img src="images/user.png" height="350vh" width="350vw" class="container userimg">
	<div class="input-group userblock">
<center>
	 <br><br>
		<div>

		<label for="mat">
			MATRICULE:
		</label>
		<input autocomplete="off" class="form-control fw-bold" required type="text" name="mat" id="mat" maxlength="6">
		</div>

		<br>
		
		<div>
			
		<label for="nom">
			NOMS:                 
		</label>
		<input autocomplete="off" class="form-control fw-bold" required type="text" name="nom" id="nom">
		</div>

		<br>

		<div>
		<label for="prenom">
			PRENOMS:
		</label>
		<input autocomplete="off" class="form-control fw-bold" required type="text" name="prenom" id="prenom">
		</div>

		<br>

		<div>
		<br>	
		<label for="mdp">
			MOT DE PASSE:
		</label>
		<input autocomplete="off" class="form-control fw-bold" required type="password" name="mdp" id="mdp"  onkeyup="verify()">
		<i class="fa fa-eye fa-3x" id="eye" onclick="eye()" ></i>	
		</div>
</center>
	</div>
</div>
<center>
		<input type="submit" name="Enregistrer" value="Enregistrer" class="btn container w-75 h-25 fs-3 fw-bold">
</center>
</form>

</div>
<?php 
if (isset($_POST["Enregistrer"])) 
{
// -- insertion du  user------------------------------------------------------------------- --

	$mat=$_POST["mat"];
	$nom=$_POST["nom"];
	$prenom=$_POST["prenom"];
	$pw=$_POST["mdp"];

if (strlen($pw)>=8) {

	$exist=FALSE;

	$searchuser=$con->query("SELECT * FROM ".$table5);
	while ($find=$searchuser->fetch()) 
	{
		if($find[$champ51]==$mat)$exist=TRUE;
	}
	if (!$exist) {

	$insert_user=$con->prepare("INSERT INTO ".$table5."(".$champ51.",".$champ52.",".$champ53.",".$champ54.",".$champ55.") VALUES(?,?,?,?,?)");
	$insert_user->execute(array($mat,$nom,$prenom,$pw,'2'));
?>

<div class="container bg-success msg fs-3 w-75">
	<?php echo $prenom."  ".$nom."  a bien ete enregistre"; ?>
</div>

<?php
}else{
?>

<div class="container bg-danger msg fs-3 w-75">
	Echec de l'insertion!!..  <?php echo "Le matricule ".$mat." a deja ete enregistre"; ?>
</div>

<?php
}
?>

<?php
}else{
?>

<div class="container bg-danger msg fs-3 w-75">
	Echec de l'insertion!!..  le mot de passe est trop court
</div>

<?php	
}
?>

<script type="text/javascript">
	setTimeout(
		function()
		{
			window.location.assign("users.php")
		},3000
		)
</script>

<?php
}
// -- ---------------------------------------------------------------------------------------- --
 ?>


</div>

<!-- ---------------------------------------------------------------------------------------------- -->



<!-- ------------------------------Liste des users-------------------------------------------------------- -->

<div class="liste container w-75"></div>

<!-- -------------------------------------------------------------------------------------------------------------- -->






<!-- ---------------------------------changer admin----------------------------------------------------------------- -->


<div class="changer container">

<div class="extext container">

	 <form method="post">

<center class="titre fw-bold container fs-3 w-75"> CHANGER   D'ADMINISTRATEUR</center>
<div class="blockext container w-75">	

	<img src="images/user.png" width="350vw" height="350vh" class="container userimg">
	<div class="input-group userblock">
<center>
	 <br><br>
	
		<div>

		<label for="updmat">
			MATRICULE:
		</label>
		<input autocomplete="off" class="form-control fw-bold" required type="text" name="updmat" id="updmat" maxlength="6">
		</div>

		<br>
		
		<div>
			
		<label for="updnom">
			NOMS:                 
		</label>
		<input autocomplete="off" class="form-control fw-bold" required type="text" name="updnom" id="updnom">
		</div>

		<br>

		<div>
		<label for="updprenom">
			PRENOMS:
		</label>
		<input autocomplete="off" class="form-control fw-bold" required type="text" name="updprenom" id="updprenom">
		</div>

		<br>

		<div>
		<br>	
		<label for="updmdp">
			MOT DE PASSE:
		</label>
		<input autocomplete="off" class="form-control fw-bold" required type="password" name="updmdp" id="updmdp"  onkeyup="updverify()">
		<i class="fa fa-eye fa-3x" id="updeye" onclick="updeye()" ></i>	
		</div>
	
</center>
	</div>
</div>
<center>
		<input type="submit" id="modifier" name="Modifier" value="OK" class="btn contain w-75 h-25 fs-3 fw-bold">
</center>
	 </form>

</div>
<div class="res"></div>


<script>
	

$(document).ready(function(){
    
setInterval(
	function()
	{
        $.post(
            "modules/listuser.php", 
            {

            },

            function(data){
                 $(".liste").html(data);
                        },
            "html"
         	);
	},0
    )



 $("#modifier").click(function(e){
 	e.preventDefault()
 	if (confirm("Vous etes sur le point de changer d'administrateur; Validez-vous ce choix?")) 
 	{
        $.post(
            "modules/changeadmin.php", 
            {
                updmat : $("#updmat").val(), 
                updnom : $("#updnom").val(), 
                updprenom : $("#updprenom").val(), 
                updmdp : $("#updmdp").val() 
            },

            function(data){
                 $(".res").html(data);
                        },
            "html"
         	);
 	}
    	});
      });


</script>
 <!-- -- ---------------------------------------------------------------------------------------- -- -->


</div>




<!-- ------------------------------------------------------------------------------------------------------------------->

</body>

<?php 
}
?>
<script type="text/javascript">
function eye()
{
	setTimeout(
		function ()
		{		
				document.getElementById('eye').className="fa fa-eye fa-3x";
				document.getElementById('mdp').type="password";
				document.getElementById('eye').style.color="#D82F84";
				document.getElementById('eye').style.textShadow="5px 1px 5px rgba(0,0,0,0)";
			
		},1000
		)
				document.getElementById('mdp').type="text";
				document.getElementById('eye').className="fa fa-eye-slash fa-3x";
				document.getElementById('eye').style.color="rgba(255,255,255,.7)";
				document.getElementById('eye').style.textShadow="5px 1px 5px rgba(0,0,0,.8)";
}
function verify()
{
	if(document.getElementById('mdp').value.length<8)
	{
		document.getElementById('mdp').style.color='red'
	}else{
		document.getElementById('mdp').style.color='green'
	}

}



function updeye()
{
	setTimeout(
		function ()
		{		
				document.getElementById('updeye').className="fa fa-eye fa-3x";
				document.getElementById('updmdp').type="password";
				document.getElementById('updeye').style.color="#D82F84";
				document.getElementById('updeye').style.textShadow="5px 1px 5px rgba(0,0,0,0)";
			
		},1000
		)
				document.getElementById('updmdp').type="text";
				document.getElementById('updeye').className="fa fa-eye-slash fa-3x";
				document.getElementById('updeye').style.color="rgba(255,255,255,.7)";
				document.getElementById('updeye').style.textShadow="5px 1px 5px rgba(0,0,0,.8)";
}
function updverify()
{
	if(document.getElementById('updmdp').value.length<8)
	{
		document.getElementById('updmdp').style.color='red'
	}else{
		document.getElementById('updmdp').style.color='green'
	}

}
</script>