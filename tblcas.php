
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
<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
<!-- <link rel="stylesheet" type="text/css" href="recherche/css/stylerechercheaccueil.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="css/styleaccueil.css"> -->
<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-dist/css/bootstrap.css">
    <script src="bootstrap-5.0.0-dist/js/bootstrap.js"></script>
<script src="jquery/jquery-3.5.1.js"></script>
<style type="text/css">
    .titre
    {
        background-color: #D82F84;
    }
</style>

    <table border="2" class="container-md table table-light">
<div class="titre container-md text-uppercase text-center fw-bold fs-3 ">PANNES DU MOIS</div>
       <tr>
            <th>NUMERO DU CAS DE PANNE</th>
            <th>MATRICULE DU CONCERNE</th>
            <th>IDENTIFIANT DE PANNE</th>
            <th>STATUT</th>
            <th>DATE DE DECLARATION</th>
            <th></th>

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
            if ($find[$champ103]=='NON RESOLU') 
            {
            ?>
            <td>
                <center>
                <a class="btn titre text-light" href="panne_resolue.php?idcas=<?php echo $find[$champ105];?>&idpanne=<?php  echo $find[$champ102];?>">
                    resoudre
                </a>
                </center>
            </td>
<?php 
            }else{
            ?>
            <td></td>
            <?php    
            }
}
?>
        </tr>
    </table>

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
