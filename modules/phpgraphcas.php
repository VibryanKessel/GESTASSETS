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
        overflow-x: auto;
    }
</style>
<link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="../bootstrap-5.0.0-dist/css/bootstrap.css">
<script src="../Chartjs/chart.js"></script>

<?php 

$x='';
$total='';
$resolu='';
$nonresolu='';

$lastdatenonres=$con->query('SELECT day(MAX('.$champ104.')) AS lim FROM '.$table10.' WHERE  month('.$champ104.')=month(CURDATE())');
$lastdateres=$con->query('SELECT day(MAX('.$champ83.')) AS lim FROM '.$table8.' WHERE  month('.$champ83.')=month(CURDATE())');

$daysnonres=$lastdatenonres->fetch();
$daysres=$lastdateres->fetch();

if($daysnonres['lim']>$daysres['lim'])
{
    $lim=$daysnonres['lim'];
}else{
    $lim=$daysres['lim'];
}

for($day=1;$day<=$lim;$day++) {

  $x.="'".$day."'".',';

  $totaux=$con->query('SELECT COUNT('.$champ105.') AS nbrecas FROM '.$table10.' WHERE  month('.$champ104.')=month(CURDATE()) AND day('.$champ104.')="'.$day.'"');

  $resolus=$con->query('SELECT COUNT('.$champ85.') AS casresolu FROM '.$table8.' WHERE  month('.$champ83.')=month(CURDATE()) AND day('.$champ83.')="'.$day.'"');

  $nonresolus=$con->query('SELECT COUNT('.$champ105.') AS casnonresolu FROM '.$table10.' WHERE  month('.$champ104.')=month(CURDATE()) AND day('.$champ104.')="'.$day.'" AND '.$champ103.'="NON RESOLU"');
  
  $nb=$totaux->fetch();
  $total.=$nb['nbrecas'].',';

  $nb=$resolus->fetch();
  $resolu.=$nb['casresolu'].',';
  
  $nb=$nonresolus->fetch();
  $nonresolu.=$nb['casnonresolu'].',';
  
}

$x=trim($x,',');
$total=trim($total,',');
$resolu=trim($resolu,',');
$nonresolu=trim($nonresolu,',');
?>

<?php 
$height=92;
$width=300;

if (isset($_GET['height'],$_GET['height'])) 
{
    $height=$_GET['height'];
    $width=$_GET['width'];
}

?>


<canvas id="myChart" class="container-fluid mb-1" width="<?php echo($width) ?>" height="<?php echo($height) ?>" style="background-size:contain;background-repeat:no-repeat;background-position:center;background-image: url('../images/logo5.png')"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php echo $x; ?>],
        datasets: [{
            label: ' CAS DE PANNE PAR JOUR',
            data: [<?php echo $total; ?>],
            backgroundColor: [
                'transparent'
            ],
            borderColor: [
                'rgba(216,47,132,1)'
            ],
            borderWidth: 3
        },

        {
            label: ' CAS DE PANNE RESOLUS PAR JOUR',
            data: [<?php echo $resolu; ?>],
            backgroundColor: [
                'transparent'
            ],
            borderColor: [
                'rgba(0,0,100,1)'
            ],
            borderWidth: 3
        },

        {
            label: ' CAS DE PANNE NON RESOLUS PAR JOUR',
            data: [<?php echo $nonresolu; ?>],
            backgroundColor: [
                'transparent'
            ],
            borderColor: [
                'rgba(0, 0, 0, .7)'
            ],
            borderWidth: 3
        }
        ]
    },
    options: {
        legend: {
            labels: {
                // This more specific font property overrides the global property
                
            }
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>


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
</html>
