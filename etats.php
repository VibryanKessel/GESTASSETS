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
if (!isset($_SESSION["id"])) {
    header("location:portail/authentification.php");
}
 ?>

<?php require "modules/tables.php" ;?>


<!DOCTYPE html>
<html>
<head>
    <title>ETATS</title>
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
<div style="height:100vh;position: relative;left: 20vw;"> 

<br><br>

<div class="container col-12 d-flex">
<a onclick="materiel()" class="btn col-6 fs-2"><center>MATERIELS</center></a><a onclick="fournisseur()" class="btn col-6 fs-2">FOURNISSEURS</a>
</div>
<center style="height: 500vh;width: 80vw; position: fixed;">
<iframe id="content" src="tbmat.php" class="container-fluid" style="overflow-y: hidden;height: 200%;position: relative;"></iframe>
</center>

</div>
</body>

<script type="text/javascript">
    function materiel() 
    {
        document.getElementById('content').src="tbmat.php"
    }

    function fournisseur() 
    {
        document.getElementById('content').src="tbfsseur.php"
    }


</script>