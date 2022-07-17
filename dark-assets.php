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
	<title>OPERATIONS SUR ASSETS</title>
	<meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="recherche/css/stylerechercheasset.css">
<link rel="stylesheet" type="text/css" href="css/styleassets.css">
<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-dist/css/bootstrap.css">
    <script src="bootstrap-5.0.0-dist/js/bootstrap.js"></script>
<script src="jquery/jquery-3.5.1.js"></script>
</head>
<body class="bg-dark">

<?php require "modules/navbar.php"; ?>

<form method="post">
    <?php require 'deconnexion/deconnexion.php'; ?>
    <br><br>
<center>
<table class="container-fluid">
<tr class="container-fluid"><td class="float-end fw-bold fs-lg-1 display-6 text-secondary">RANGER PAR :</td></tr>
<tr><td><br></td></tr>
    <tr>
<td class="text-center fs-lg-1"><input type="radio" class="radio" checked onclick="check1()" id="1"><label for="1">TYPE(par defaut)</label></td>
<td class="text-center fs-lg-1"><input type="radio" class="radio" onclick="check2()" id="2"><label for="2">RECEPTIONNISTE</label></td>
<td class="text-center fs-lg-1"><input type="radio" class="radio" onclick="check3()" id="3"><label for="3">FOURNISSEUR</label></td>
<td class="text-center fs-lg-1"><input type="radio" class="radio" onclick="check4()" id="4"><label for="4">ANCIENNETE</label>
</td>
    </tr>
</table>
<center>
<?php  require "recherche/recherche.php";?>
</center
>
<input type="text" id="choix" readonly>
</center>
</form>

<div class="res"></div>


<script>
  
$(document).ready(
setInterval(
     function(){
        $.post(
            "modules/listtables.php", 
            {
                champ : $("#choix").val() 
            },

            function(data){
                 $(".res").html(data);
                        },
            "html"
         );
    },0
    )
);
 
</script>

</body>
</html>
<script type="text/javascript">

    setInterval(
        function ()
        {
       if(document.getElementById('1').checked)document.getElementById("choix").value=1;
              if(document.getElementById('2').checked)document.getElementById("choix").value=2;
                     if(document.getElementById('3').checked)document.getElementById("choix").value=3;
                            if(document.getElementById('4').checked)document.getElementById("choix").value=4;
        },0
        );

<?php 
    for ( $i = 1; $i < 5; $i++) {
        
       echo '

       function check'.strval($i).'(){
        for(i=1;i<5;i++)
        {
            j=String(i);
        if(document.getElementById(j).checked&&j!='.strval($i).')document.getElementById(j).checked=false;
        }
    }';
    }
 ?>
</script>