   <?php session_start(); ?>
<?php
 
$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";

require("../conn.php");
?>


    <link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../recherche/css/stylerechercheaccueil.css">
    <link rel="stylesheet" type="text/css" href="../css/styleaccueil.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.0.0-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.0.0-dist/css/bootstrap.css">
    <script src="../bootstrap-5.0.0-dist/js/bootstrap.js"></script>
    <script src="../jquery/jquery-3.5.1.js"></script>

<?php require "tables.php";?>

<?php 


 	$asset=$con->query("SELECT * FROM ".$table1." GROUP BY ".$champ12);

?>
<div id="tbmat">
	
    <table border="2" class="container-fluid-md vw-100 table-responsive-md table-light table-bordered">
<div class="bg-dark container-fluid-md text-uppercase vw-100 text-center text-light fw-bold fs-3 " style="height: 5vh;padding-top: 1vh">ETAT DU MATERIEL</div>
       <tr>
       		<th>ELEMENTS</th>
       		<th>DEFECTUEUX</th>
       		<th>EN PANNE</th>
       		<th>BONS</th>
       		<th>EN STOCK</th>
       		<th class="details"></th>
       </tr>
       
<?php 
while($result=$asset->fetch())
{
 	$d=$con->query("SELECT COUNT(".$champ11.") AS nbre_d FROM ".$table1." WHERE ".$champ12."='".$result[$champ12]."' AND ".$champ15."='DEFECTUEUX'");
 	$nbd=$d->fetch();
 	$p=$con->query("SELECT COUNT(".$champ11.") AS nbre_p FROM ".$table1." WHERE ".$champ12."='".$result[$champ12]."' AND ".$champ15."='EN PANNE'");
 	$nbp=$p->fetch();
 	$b=$con->query("SELECT COUNT(".$champ11.") AS nbre_b FROM ".$table1." WHERE ".$champ12."='".$result[$champ12]."' AND ".$champ15."='BON'");
 	$nbb=$b->fetch(); 
 	$s=$con->query("SELECT *  FROM ".$table2." WHERE ".$champ22."='".$result[$champ12]."'");
 	$nbs=$s->fetch();
?>
		<tr>
			<th style="text-transform: uppercase;"><?php echo $result[$champ12]; ?></th>			
			<td><?php echo $nbd["nbre_d"]; ?></td>			
			<td><?php echo $nbp["nbre_p"]; ?></td>			
			<td><?php echo $nbb["nbre_b"]; ?></td>		
			<td><?php echo $nbs[$champ23]; ?></td>	

		</tr>
<?php } ?>
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
