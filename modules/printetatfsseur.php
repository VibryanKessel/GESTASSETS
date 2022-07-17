<?php session_start(); ?>
<?php
 
$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";

require("../conn.php");
?>


<?php require "tables.php";?>
<style type="text/css">
	body
	{
		overflow-x: hidden;
	}

</style>
<link rel="stylesheet" type="text/css" href="../bootstrap-5.0.0-dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.css">
<script src="../Chartjs/chart.js"></script>

<?php

$i=0;
$x='';
$y='';

$fsseur=$con->query('SELECT * FROM '.$table1.' WHERE  month('.$champ16.')=month(CURDATE()) GROUP BY '.$champ14.' ORDER BY '.$champ14.' ASC');
while ($res=$fsseur->fetch()) {

  $x.="'".$res[$champ14]."'".',';
  ++$i;

  $nb=$con->query('SELECT COUNT('.$champ11.') AS nbd FROM '.$table1.' WHERE month('.$champ16.')=month(CURDATE()) AND '.$champ14.'="'.$res[$champ14].'"');
  
  $nbre_defectueux=$nb->fetch();
  

  $y.=$nbre_defectueux['nbd'].',';
}

$x=trim($x,',');
$y=trim($y,',');
?>

<?php 
	$width=600;
	$height=350;


if (isset($_GET['height'],$_GET['width']))
{
	$height=$_GET['height'];
	$width=$_GET['width'];
}

?>
<center class="container">
	
<canvas id="myChart" class="container-fluid mb-1" width="<?php echo($width) ?>" height="<?php echo($height) ?>" style="background-size:contain;background-repeat:no-repeat;background-position:center;background-image: url('../images/logo5.png')"></canvas>



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



</center>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $x; ?>],
        datasets: [{
            label: 'Etat sur les fournisseurs du mois',
            data: [<?php echo $y; ?>],
            backgroundColor: [
            <?php 
            $j=0;
            	while ($j<$i) {
   					
            		echo "'rgba(240,0,80,.7)'";
            		$j++;
            		if ($j!=$i)echo",";  
            	}

            ?>
            ],
            borderColor: [
            <?php 
            $j=0;
            	while ($j<$i) {
   					
            		echo "'rgba(0,0,0,.6)'";
            		$j++;
            		if ($j!=$i)echo",";  
            	}
            	
            ?>
            ],
            borderWidth: 1
        }]
    },
    options: {
    	responsive: true,
        // tooltips: {
        // 	titleMarginBottom: 200
        // 	},
	    title: {
	    display: true,
	    labelString: 'DEFECTUEUX',
	    fontColor: 'blue',
	    fontSize: 10	
	            	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
            xAxes: [{
             ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>