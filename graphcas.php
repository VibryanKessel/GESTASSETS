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
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-dist/css/bootstrap.css">
    <script src="bootstrap-5.0.0-dist/js/bootstrap.js"></script>
    <script src="Chartjs/chart.js"></script>
    <script src="jquery/jquery-3.5.1.js"></script>
</head>

<body>
    
    <br><br>
<div class="res bg-light" id="res"></div>


<script>

function post(){
        $.post(
             "modules/phpgraphcas.php", 
            {

            },

            function(data){
                 $(".res").html(data);
                        },
          
            "html"
         );
    }



window.onload=post(); 

setInterval(

function post(){
        $.post(
             "modules/phpgraphcas.php", 
            {

            },

            function(data){
                 $(".res").html(data);
                        },
          
            "html"
         );
    },5000
    )

 
</script>


</body>