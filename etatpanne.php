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
    <title></title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-dist/css/bootstrap.css">
    <script src="bootstrap-5.0.0-dist/js/bootstrap.js"></script>
<script src="jquery/jquery-3.5.1.js"></script>
</head>
<body>
<style type="text/css">
*{
    text-align: center;
 }

 body
 {
    background-image: url('images/logo5.png');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: top;
 }

td{
    height: 3vh;
    font-size: .75em;
 }
 th
 {
    height: 3vh;
    font-size: .5em;

 }
</style>


<?php require "modules/tables.php"; ?>

<?php 

$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";

require("conn.php");
?>


<?php require "modules/tables.php"; ?>

<?php  
$infocas=$con->query('SELECT* FROM '.$table10.' WHERE month('.$champ104.')=month(CURDATE())');
$info=$con->query('SELECT* FROM '.$table10.' WHERE month('.$champ104.')=month(CURDATE())');

?>
<div class="corps container">

    <table border="2" class="container-md table-light table-bordered">
<div class="container-md text-uppercase text-light text-center fw-bold">PANNES DU MOIS</div>
       <tr>
            <th>NUMERO DU CAS DE PANNE</th>
            <th>MATRICULE DU CONCERNE</th>
            <th>IDENTIFIANT DE PANNE</th>
            <th>STATUT</th>
            <th>DATE DE DECLARATION</th>
       </tr>
<?php  
while($find=$infocas->fetch()){
?>
        <tr>
            <td><?php echo $find[$champ105]; ?></td>
            <td><?php echo $find[$champ101]; ?></td>
            <td><?php echo $find[$champ102]; ?></td>
            <td><?php echo $find[$champ103]; ?></td>
            <td><?php echo $find[$champ104]; ?></td>
<?php 
}
?>
        </tr>
    </table>
</div>


<!-- -------------------footer-------------------------------------------------------------------------------- -->

<footer class="container col-12 fixed-bottom bg-secondary d-flex">
    <div class="col-6">
        
    <div class="container">
        Douala  
    </div>  
    <div class="container">
746 Rue Bebey Eyidi, <br> Douala - Cameroun 
    </div>
    <div class="container">
Tel: +237 655 555 715
    </div>

    </div>
    
    <div class="col-6">
    <u class="fw-bold"> WWW.INTELCIA.COM</u>
    <p>BP: 12995,
    <br>
     Douala / Cameroun
    </p>
        <div class="d-flex">
            <div class="col-2"></div>
            <div class="col-2"><i class="fa fa-facebook "></i></div>
            <div class="col-2"><i class="fa fa-phone "></i></div>
            <div class="col-2"><i class="fa fa-whatsapp "></i></div>
            <div class="col-2"><i class="fa fa-linkedin "></i></div>
        </div>  
    </div>
</footer>

<!-- ---------------------------------------------------------------------------------------------------------- -->

</body>
