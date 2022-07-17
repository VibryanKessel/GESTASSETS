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
    <title>LISTE DES LIVRAISONS</title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/ico" href="icon/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="recherche/css/stylerechercheaccueil.css">
    <link rel="stylesheet" type="text/css" href="css/styleaccueil.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-dist/css/bootstrap.css">
    <script src="bootstrap-5.0.0-dist/js/bootstrap.js"></script>
    <script src="jquery/jquery-3.5.1.js"></script>
</head>
<body>

<?php require "modules/navbar.php"; ?>

<div class="baracc container-fluid col-12 d-flex">
<a href="nvlivraison.php" class=" btn col-3 fs-2"><center>STOCKER DU MATERIEL</center></a><a class="panne btn col-3 fs-2">DERNIERES LIVRAISONS</a><a class=" btn col-3 fs-2" href="accueil.php"><center>DEPLOYER UN ASSET</center></a><a class=" btn col-3 fs-2" href="panne_declaree.php"><center>PANNE</center></a>
</div>
<br>
<div class="corps container">

<div class="res container"></div>

</div>
</body>

<script>
  
$(document).ready(
setInterval(
     function(){
        $.post(
            "modules/phplistlivraison.php", 
            {
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