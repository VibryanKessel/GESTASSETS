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
    <title>ENREGISTRER UNE PANNE</title>
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
<a href="nvlivraison.php" class=" btn col-3 fs-2"><center>STOCKER DU MATERIEL</center></a><a href="listlivraison.php" class=" btn col-3 fs-2">DERNIERES LIVRAISONS</a><a class=" btn col-3 fs-2" href="accueil.php"><center>DEPLOYER UN ASSET</center></a><a class=" panne col-3  fs-2"><center>PANNE</center></a>
</div>
<br>
<div class="barracc container-fluid col-12 d-flex">
<a class="panne panneitem col-3 fs-3"><center>PANNE DECLAREE</center></a><a class=" panneitem col-3 fs-3" href="listcas.php"><center>ETAT PANNES</center></a><a class=" panneitem col-3 fs-3" href="listresolutions"><center>ETAT RESOLUTIONS</center></a><a class=" panneitem col-3 fs-3" href="pannes_solutions.php"><center>REPERTOIRE SOLUTIONS</center></a>
</div>
</div>

<br><br>

<div class="corps container">

    <div class="tablediv">
        <form method="post">
            <table void class="table1 table-responsive-md" cellspacing="0">
                <tr>
                    <td><label class="fw-bold  fs-3 text-light" for="mat">MATRICULE DE L'AGENT :</label></td>
                    <td><input autocomplete="off" required id="mat" maxlength="6" class="form-control  fs-3" type="text"></td>
                </tr>

                <tr>
                    <td><label class="fw-bold  fs-3 text-light" for="service">SERVICE DE L'AGENT :</label></td>
                    <td><input autocomplete="off" required id="service" class="form-control  fs-3" type="text"></td>
                </tr>

                <tr>
                    <td><label class="fw-bold  fs-3 text-light" for="panne">DESCRIPTION PANNE:</label></td>
                    <td>
                    	<textarea class="addpanne w-100 fs-1" id="textpanne" placeholder="Je n'ai pas trouve ma panne dans la liste ci-dessous" oninput="description()">
                    	</textarea>
                    	<select  id="panne" class="form-control "></select>
                    </td>
                </tr>


	            <tr>
	                <td><label class="fw-bold  fs-3 text-light" for="periode">DATE :</label></td>
	                <td><input autocomplete="off" id="periode" class="form-control  fs-3" readonly type="text"></td>
	            </tr>


            </table>
            <div class="container btndiv">
                    <input  type="submit" id="submit" value="ENREGISTRER">
                    <input  type="reset" value="ANNULER" >
            </div>
        </form>

    </div>
    <br>
    <br>
    <br>

    <div class="result"></div>
</div>
</body>
</html>
<script>
panne=""

function description()
{
	panne=document.getElementById('textpanne').value
	document.getElementById('panne').selectedIndex=0
}


function fixed()
{
    document.getElementById('nav').style.position='fixed'
}

$(document).ready(function(){

    $("#panne").click(function(e){
        e.preventDefault();
	document.getElementById('textpanne').value=""
    panne=document.getElementById('panne').options[this.selectedIndex].text;
    });

 $("#submit").click(function(e){
        e.preventDefault();
if(panne!="")
{
    
          if (confirm('Declarer une nouvelle panne ?')) 
          {
            $.post(
                'modules/phppanne.php', // Un script PHP que l'on va créer juste après
                {
                    mat_agent : $("#mat").val(), 
                    panne : panne,
                    service : $("#service").val(), 
                    periode : $("#periode").val()
                },

            function(data){
                   alert("Panne enregistree")
                        },
            'text'
         );
        }

}else{
         alert("Choisissez une description pour la panne!!");
     }
        });


     $("#panne").focus(function(e){
        e.preventDefault();
  
    $.post(
            'modules/refreshpanne.php', // Un script PHP que l'on va créer juste après  
            {

            },

            function(data){
            $("#panne").html(data)

            },
            'html'
         );
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
    if (confirm('Etes vous sur de vouloir retirer le type "'+re+'" ?(cela entraine la suppression de ses composants)'))
    {
        $.post(
            'modules/retype.php', // Un script PHP que l'on va créer juste après
            {
                retype : re  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
            },
 
            function(data){
            $(".result").html(data)
         
            },
            'html'
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

