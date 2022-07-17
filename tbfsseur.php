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
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
    <!-- <link rel="stylesheet" type="text/css" href="recherche/css/stylerechercheaccueil.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="css/styleaccueil.css"> -->
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-dist/css/bootstrap.css">
    <script src="bootstrap-5.0.0-dist/js/bootstrap.js"></script>
    <script src="Chartjs/chart.js"></script>
    <script src="jquery/jquery-3.5.1.js"></script>

</head>
<style type="text/css">
    body
    {
        overflow-y: auto;
    }
    .titre
    {
        background: #E91E63 ;
    }

    .btn
    {
        background-color: #E91E63;
        margin:.5px; 
        color: white;
        width: 49%;
    }
    .btn:hover
    {
        background-color: white;
        color: #E91E63;
    }
</style>

<body style="overflow-y: hidden;">
    <br><br><br>
    <div class="container col-12" id="entete" >
 <center>
     <a onclick="print('modules/printetatfsseur.php?height=50vh&width=40vw')" href="#" ><button type='button' title="imprimer l'etat" class='btn titre btn-raised h-50 w-25 '><i class='glyphicon glyphicon-print fs-3'></i></button></a>
 </center>
 
</div>

    <iframe src="modules/etatfsseur.php" id='content' class="container-fluid w-100 vh-100" ></iframe>

<script>
  
        function print(pdf) {
        // Créer un IFrame.
        var iframe = document.createElement('iframe');  
        // Cacher le IFrame.    
        iframe.style.visibility = "hidden"; 
        iframe.style.width = "50vw"; 
        iframe.style.height = "50vh"; 
        // Définir la source.    
        iframe.src = pdf;        
        // Ajouter le IFrame sur la page Web.    
        document.body.appendChild(iframe);  
        iframe.contentWindow.focus();
        setTimeout(       
        function () {
        iframe.contentWindow.print(); // Imprimer.
        },1000
        )
        
    } 
</script>


</body>