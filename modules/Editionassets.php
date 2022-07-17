<?php 
session_start();
?>



<?php 
$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";

require("../conn.php");
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
    header("location:../portail/authentification.php");
}
 ?>


<?php 
require "tables.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>MODIFICATION DE L'ASSET <?php echo $_GET[$champ11]; ?></title>
	<meta charset='utf-8'>
  <meta id="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/ico" href="../icon/favicon.ico" />  
  <link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="../css/stylemodif.css">
  <link rel="stylesheet" type="text/css" href="../recherche/css/stylerechercheaccueil.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap-4.0.0-dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap-5.0.0-dist/css/bootstrap.css">
  <script src="../jquery/jquery-3.5.1.js"></script>
</head>
<body class="bg-light">
<div class="marquee">
<marquee scrollamount="10"  bgcolor="rgba(0,0,0,.5)"> REMPLACEZ PAR LES VALEURS VOULUES DANS LES CHAMP1S CONCERNES</marquee>
</div>
<?php require 'deconnexion/deconnexion.php'; ?>

<table class="table2 container">
<br><br><br><br>
	<tr>
<td> <label class="fw-bold display-6">TYPE</label></td>
	<tr>
		<td>
<?php require "recherche/recherche.php"; ?>
		</td>
	</tr>
</table>

<div class="back fixed-top fixed-left"><a href="../assets.php" title="Revenir a la page precedente"><i class="fa fa-arrow-circle-left fa-5x" aria-hidden="true"></i></a></div>


<div class="tablediv container">
<form method="post">
<table void class="table1">

<tr>
<td><label class="fw-bold  display-6" for="<?php echo $champ11; ?>">IDENTIFIANT :</label></td>
<td><input class="form-control h-50 fs-3 display-6" type="text"  value="<?php echo $_GET[$champ11];?>" id="<?php echo $champ11; ?>"></td>
</tr>

<tr>
<td><label class="fw-bold  display-6" for="<?php echo $champ15; ?>">ETAT :</label></td>
<td>
  <?php require "etat.php"; ?>
</td>
</tr>

<tr>
<td><label class="fw-bold  display-6" for="<?php echo $champ14; ?>">FOURNISSEUR :</label></td>
 <td><input  required  class="form-control h-50 fs-3 display-6" type="text" value="<?php echo $_GET[$champ14];?>"  id="<?php echo $champ14; ?>"></td>
</tr>



<tr>
<td><label class="fw-bold  display-6" for="<?php echo $champ17; ?>">GARANTIE :</label></td>
<td><input  class="form-control h-50 fs-3 display-6" type="date" min="<?php echo $_GET[$champ16]; ?>" value="<?php echo $_GET[$champ17];?>"  id="<?php echo $champ17; ?>"></td>
</tr>

<tr>
<td><label class="fw-bold  display-6" for="<?php echo $champ16; ?>">DATE :</label></td>
<td><input  class="form-control h-50 fs-3 display-6" type="date" value="<?php echo $_GET[$champ16];?>"  id="<?php echo $champ16; ?>"></td>
</tr>

<tr>
<td><input class=" modifbtn" type="submit" id="submit"  value="ENREGISTRER"></td>
<td><input class=" modifbtn" type="reset" value="ANNULER"></td>
</tr>
</table>
</form>

</div>

</body>
<?php 

echo "
      <script>
        id='".$_GET[$champ11]."'
        type='".$_GET[$champ12]."'
        fsseur='".$_GET[$champ14]."'
        etat='".$_GET[$champ15]."'
        date='".$_GET[$champ16]."'
        garantie='".$_GET[$champ17]."'
      </script>
    ";

 ?>


<script>

	etat_change=0
$(document).ready(function(){

    $("#select").change(function(e){
        e.preventDefault();
          type=document.getElementById('select').options[this.selectedIndex].text;
    });
        $("#etat").change(function(e){
        e.preventDefault();
        etat=document.getElementById('etat').options[this.selectedIndex].text;
        etat_change=1;
        })

            

   
 $("#submit").click(function(e){
        e.preventDefault();

            $.post(
                'modifassets.php', // Un script PHP que l'on va créer juste après
                {
                    id : $("#<?php echo $champ11 ?>").val(), 
                    fsseur : $("#<?php echo $champ14 ?>").val(),
                    type : type,
                    etat : etat,
                    date : $("#<?php echo $champ16?>").val(),
                    garantie : $("#<?php echo $champ17?>").val()

                },

            function(data){
            alert('Modification enregistree')
            if(etat_change)
            {
              window.location.assign("modifetatgene.php?<?php echo $champ11; ?>="+document.getElementById("<?php echo $champ11;?>").value+"&new="+etat+"&old=<?php echo $_GET[$champ15]; ?>"+"&<?php echo $champ12; ?>="+type);
            }else{
              window.location.assign('../assets')
            }

            }
            ,'text'
         
        );

})


}) 
</script>

 