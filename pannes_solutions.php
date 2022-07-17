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
    <title>SOLUTIONS AUX PANNES</title>
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

<div class="bloctete"> 

<div class="container-fluid col-12 d-flex">
<a href="nvlivraison.php" class="btn col-3 fs-2"><center>STOCKER DU MATERIEL</center></a><a href="listlivraison.php" class="btn col-3 fs-2">DERNIERES LIVRAISONS</a><a class="btn col-3 fs-2" href="accueil.php"><center>DEPLOYER UN ASSET</center></a><a class=" panne col-3 fs-2"><center>PANNE</center></a>
</div>
<br>
<div class="container-fluid col-12 d-flex">
<a class="panneitem  col-3 fs-3" href="panne_declaree.php"><center>PANNE DECLAREE</center></a><a class="panneitem  col-3 fs-3" href="listcas.php"><center>ETAT PANNES</center></a><a class="panneitem  col-3 fs-3" href="listresolutions.php"><center>ETAT RESOLUTIONS</center></a><a class="panne panneitem  col-3 fs-3" href="pannes_solutions.php"><center>REPERTOIRE SOLUTIONS</center></a>
</div>
</div>

    <div class="container entete">
    <table class="table2">
        <tr>
            <td>
                <br><br>
            </td>
        </tr>
        <tr>
        	<td>            
                <a onclick="print('etatsolution.php')" href="#" ><button type='button' title="imprimer l'etat" class='btn btn-raised h-50 w-50'><i class='glyphicon glyphicon-print fs-3'></i></button></a>
                <br><br><br>
            </td>
        </tr>
    </table>
    </div>

<?php 

$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";

require("conn.php");
?>


<?php require "modules/tables.php"; ?>

<?php  
$pannes_solutions=$con->query('SELECT* FROM '.$table9.','.$table8.
                                    ' WHERE '.
                                    $table8.'.'.$champ82.'='.$table9.'.'.$champ91
                            );

?>
<div class="corps container">

    <table border="2" class="container-md table table-light table-hover">
<div class="titre container-md text-uppercase text-center fw-bold fs-lg-1 ">ETAT SUR LES PANNES ET LEURS SOLUTIONS</div>
       <tr>
            <th>IDENTIFIANT DE PANNE</th>
            <th>DESCRIPTION</th>
            <th>SOLUTION</th>
       </tr>
<?php  
while($find=$pannes_solutions->fetch()){
?>
        <tr>
            <td><?php echo $find[$champ91]; ?></td>
            <td><?php echo $find[$champ92]; ?></td>
            <td><?php echo $find[$champ84]; ?></td>
        </tr>
<?php 
}
?>
    </table>
</div>
</body>



<script>
    function print(pdf) {
        // Créer un IFrame.
        var iframe = document.createElement('iframe');  
        // Cacher le IFrame.    
        iframe.style.visibility = "hidden"; 
        // Définir la source.    
        iframe.src = pdf;        
        // Ajouter le IFrame sur la page Web.    
        document.body.appendChild(iframe);  
        iframe.contentWindow.focus();       
        iframe.contentWindow.print(); // Imprimer.
    }
</script>