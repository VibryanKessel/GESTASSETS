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
	canvas
	{
		background-color: rgba(255,255,255,.8);
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

  $nb=$con->query('SELECT COUNT('.$champ11.') AS nbd FROM '.$table1.' WHERE month('.$champ16.')=month(CURDATE()) AND '.$champ14.'="'.$res[$champ14].'" AND '.$champ15.'="DEFECTUEUX"');
  
  $nbre_defectueux=$nb->fetch();
  

  $y.=$nbre_defectueux['nbd'].',';
}

$x=trim($x,',');
$y=trim($y,',');
?>

<?php 
	$width=200;
	$height=70;


if (isset($_GET['height'],$_GET['width']))
{
	$height=$_GET['height'];
	$width=$_GET['width'];
}

?>
<center class="container">
	
<canvas id="myChart" class="container-fluid mb-1" width="<?php echo($width) ?>" height="<?php echo($height) ?>" class="bg-light"></canvas>

</center>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $x; ?>],
        datasets: [{
            label: 'Nombre d\'appareil non conformes selon les fournisseurs',
            data: [<?php echo $y; ?>],
            backgroundColor: [
            <?php 
            $j=0;
            	while ($j<$i) {
   					
            		echo "'#E91E63'";
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