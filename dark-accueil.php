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
if(!$superuserfound)
{
    header("location: signup/signup.php");
 ?>



<?php 
}else
if (!isset($_SESSION["id"])) 
    header("location:portail/authentification.php");
 ?>

<?php 
$table="assets";//table dans laquelle chercher
$champ1="code";//champ de la table ou chercher
$champ2="frais";
$champ3="quantite_livree";
$champ4="type";
$champ5="fournisseur";
$champ6="receptionniste";
$champ7="periode";

$s=$con->query("SELECT MAX(".$champ1.") AS max FROM ".$table);
$search=$s->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>ACCUEIL</title>
	<meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="recherche/css/dark-stylerechercheaccueil.css">
    <link rel="stylesheet" type="text/css" href="css/dark-styleaccueil.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-dist/css/bootstrap.css">
    <script src="bootstrap-5.0.0-dist/js/bootstrap.js"></script>
    <script src="jquery/jquery-3.5.1.js"></script>
</head>
<body class="bg-secondary">


<?php require "modules/navbar.php"; ?>

<div class="corps container">
    
    <table class="table2">
        <tr>
            <td>
                <br><br>
                <?php require 'deconnexion/deconnexion.php'; ?>
            </td>
    	<tr>
    <td> <label class="fw-bold text-light display-6">TYPE</label></td>
    	<tr>
    		<td>
    <?php require "recherche/recherche.php"; ?>
    		</td>
    	</tr>
    </table>
<br><br><br><br><br><br>
    <div class="tablediv">
        <form method="post">
            <table void class="table1">

                <tr>
                    <td><label class="fw-bold text-light display-6" for="code">CODE :</label></td>
                    <td><input id="code" class="form-control h-50 fs-3 display-6" type="text" readonly value=<?php echo $search["max"]+1;?>></td>
                </tr>

            <tr>
                <td><label class="fw-bold text-light display-6" for="frais">FRAIS :</label></td>
                <td><input required id="frais" class="form-control h-50 fs-3 display-6" type="number" min="0"></td>
            </tr>
            <tr>
                <td><label class="fw-bold text-light display-6" for="quantite">QUANTITE LIVREE :</label></td>
                <td><input required id="quantite" class="form-control h-50 fs-3 display-6" type="number" min="1"></td>
            </tr>

            <tr>
                <td><label class="fw-bold text-light display-6" for="reception">RECEPTIONNISTE :</label></td>
                <td><input required id="reception" class="form-control h-50 fs-3 display-6" type="text"></td>
            </tr>

            <tr>
                <td><label class="fw-bold text-light display-6" for="fsseur">FOURNISSEUR :</label></td>
                <td><input required id="fsseur" class="form-control h-50 fs-3 display-6" type="text"></td>
            </tr>

            <tr>
                <td><label class="fw-bold text-light display-6" for="periode">PERIODE :</label></td>
                <td><input id="periode" class="form-control h-50 fs-3 display-6" readonly type="datetime-local"></td>
            </tr>

            <tr>
                <td><label class="fw-bold text-light display-6" for="mdpreception">MOT DE PASSE DU RECEPTIONNISTE :</label></td>
                <td><input required="" id="mdpreception" class="form-control fs-3 display-6" type="password"></td>
            </tr>




        </table>
        <br><br>
<div class="container">
        <input  type="submit" id="submit" value="ENREGISTRER">
        <div class="br">
            <br><br><br>
        </div>
        <input  type="reset" value="ANNULER" >
</div>
        </form>
</div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="">
    	<a  id="nvtype" class="nvtype">Nouveau type d'asset</a>
    	<a  id="retype" class="retype">Retirer type d'asset</a>
    </div>
</div>
</body>
</html>
<script>

$(document).ready(function(){
type="";
     $("#select").click(function(e){
        e.preventDefault();
type=document.getElementById('select').options[this.selectedIndex].text;
    });
	
 $("#submit").click(function(e){
        e.preventDefault();
index=document.getElementById('select').selectedIndex;
        if (index>=1)
        {
    
 	      if (confirm('Etes vous sur de vouloir ajouter cet asset ?')) 
     	  {
            $.post(
                'modules/ajouter.php', // Un script PHP que l'on va créer juste après
                {
                    code : $("#code").val(), 
                    reception : $("#reception").val(),
                    frais : $("#frais").val(),
                    qte : $("#quantite").val(),
                    fsseur : $("#fsseur").val(),
                    type : type,
                    periode : $("#periode").val()

                },

            function(data){
            if($("#reception").val()!=""&&$("#frais").val()!=""&&$("#quantite").val()!=""&&$("#fsseur").val()!="")
            {
            if(data==1)
            {
            alert("L' asset a bien ete enregistre");

            }else{
            alert("L' insertion a echoue");
            }
        	}else{
        	alert("Veuillez remplir tous les champs !!");	
        	}
            			},
            'text'
         );
 	}
 	}else{
 		alert("Veuillez choisir un type d' asset dans le menu !!");
 	}
    });


    $("#nvtype").click(function(e){
        e.preventDefault();
 	nv=prompt("Entrer le type d'asset a ajouter :");
 	if (confirm('Etes vous sur de vouloir ajouter le type "'+nv+'" ?')) 
 	{
        $.post(
            'modules/nvtype.php', // Un script PHP que l'on va créer juste après
            {
                nvtype : nv  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
            },
 
            function(data){
            	if (data=="success") 
            	{
            		alert('Le type "'+nv+'" a ete enregistre');
                   if (confirm("L' asset comporte t-il des composants remplacables ?")) 
                {
                    window.location.assign("modules/addcomponents.php");
                }
            	}else{
            		alert("Echec de l'operation(il est possible que l' element existe deja)");
            	}
         
            },
            'text'
         );
 	}
    });

        $("#retype").click(function(e){
        e.preventDefault();
 	re=prompt("Entrer le type d'asset a enlever :");
  	if (confirm('Etes vous sur de vouloir retirer le type "'+re+'" ?'))
  	{
        $.post(
            'modules/retype.php', // Un script PHP que l'on va créer juste après
            {
                retype : re  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
            },
 
            function(data){
            	if (data=="success") 
            	{
            		alert('Le type "'+re+'" a ete retire');
            	}else{
            		alert("Echec de l'operation");
            	}
         
            },
            'text'
         );
     }
    });

$(document).load(setInterval(
function(){
	$.post(
		"modules/refreshtime",
		{
			time : $("#periode").val()
		},

		    function(data){
            document.getElementById('periode').value=data;
            },
            'text'
		);

		}
		)
);
});


</script>

