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

<?php  require "modules/tables.php";?>

<?php 

$searchsuperuser=$con->query("SELECT* FROM ".$table5);

$superuserfound=FALSE;
while($result=$searchsuperuser->fetch())
{
    if ($result[$champ55]==1) $superuserfound=TRUE;
}
if(!$superuserfound)header("location: signup/signup.php");
 ?>



<?php 
if (!isset($_SESSION["id"])) {
    header("location:portail/authentification.php");
}
 ?>


<!DOCTYPE html>
<html>
<head>
    <title>ENREGISTRER UNE LIVRAISON</title>
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
<body class="">


<?php require"modules/navbar.php"; ?>
<div class="container-fluid col-12 d-flex baracc">
<a class="panne btn col-3 fs-2"><center>STOCKER DU MATERIEL</center></a><a href="listlivraison.php" class=" btn col-3 fs-2">DERNIERES LIVRAISONS</a><a class=" btn col-3 fs-2" href="accueil.php"><center>DEPLOYER UN ASSET</center></a><a class=" btn col-3 fs-2" href="panne_declaree.php"><center>PANNE</center></a>
</div>
    <div class="container entete">
    <table class="table2">
        <tr>
            <td>
                <br><br>
            </td>
        </tr>
        <tr>
    <td> <label class="fw-bold fs-3 text-light">TYPE</label></td>
        <tr>
            <td>
    <?php require "recherche/recherche.php"; ?>
            </td>
        </tr>
    </table>
    </div>

<div class="corps container">

    <div class="tablediv">
        <form method="post">
            <table void class="table1">

                <tr>
                    <td><label class="fw-bold fs-3 text-light" for="mat_reception">MATRICULE RECEPTIONNISTE :</label></td>
                    <td><input autocomplete="off" maxlength="6" required id="mat_reception" class="form-control h-50 fs-3" type="text"></td>
                </tr>

                <tr>
                    <td><label class="fw-bold fs-3 text-light" for="mdp_reception">MOT DE PASSE DU RECEPTIONNISTE :</label></td>
                    <td><input autocomplete="off" required="" id="mdp_reception" class="form-control h-50 fs-3" type="password"></td>
                </tr>

                <tr>
                    <td><label class="fw-bold fs-3 text-light" for="frais">FRAIS :</label></td>
                    <td><input autocomplete="off" required id="frais" class="form-control h-50 fs-3" type="number" min="0"></td>
                </tr>

                <tr>
                    <td><label class="fw-bold fs-3 text-light" for="qte">QUANTITE :</label></td>
                    <td><input autocomplete="off" required id="qte" class="form-control h-50 fs-3" type="number" min="1"></td>
                </tr>


                <tr>
                    <td><label class="fw-bold fs-3 text-light" for="depfsseur">FOURNISSEUR :</label></td>
                    <td><input autocomplete="off" required class="form-control h-50 fs-3" type="text"></td>
                </tr>

                <tr>
                    <td><label class="fw-bold fs-3 text-light" for="periode">DATE :</label></td>
                    <td><input autocomplete="off" id="periode" class="form-control h-50 fs-3" readonly type="date"></td>
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
    <br>
    <br>
    <br>
    <br>
    <div class="result"></div>
</div>

<div class="fixed-bottom">
        <a  id="nvtype" class="nvtype">Nouveau type d'asset</a>
        <?php
    if ($_SESSION["role"]==1) echo'<div class=""><a  id="retype" class="retype">Retirer type d\'asset</a></div>';
         ?>
</div>
</body>
</html>
<script>
function fixed()
{
    document.getElementById('nav').style.position='fixed'
}

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
    
          if (confirm('Confirmer la nouvelle livraison ?')) 
          {
            $.post(
                'modules/phplivraison.php', // Un script PHP que l'on va cr??er juste apr??s
                {
                    mat_reception : $("#mat_reception").val(), 
                    mdp_reception : $("#mdp_reception").val(),
                    frais : $("#frais").val(),
                    qte : $("#qte").val(),
                    frais : $("#frais").val(),
                    fsseur : $("#depfsseur").val(),
                    type : type,
                    periode : $("#periode").val()

                },

            function(data){
                if (data==1) {
                    alert("Nouvelle livaison enregistree avec succes")
                       }else{
                    alert("Erreur !!")
                       }

                        },
            'text'
         );
    }
    }else{
        alert("Veuillez choisir le type d' asset livre dans le menu !!");
    }
    });


    $("#nvtype").click(function(e){
        e.preventDefault();
    nv=prompt("Entrer le type d'asset a ajouter :");
    if(nv!=null&&nv!="")
    {
        if (confirm('Etes vous sur de vouloir ajouter le type "'+nv+'" ?')) 
        {

            $.post(
                'modules/nvtype.php', // Un script PHP que l'on va cr??er juste apr??s
                {
                    nvtype : nv  // Nous r??cup??rons la valeur de nos input que l'on fait passer ?? connexion.php
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
    }
    });

        $("#retype").click(function(e){
        e.preventDefault();
    re=prompt("Entrer le type d'asset a enlever :");
    if(re!=null&&re!="")
    {
        if (confirm('Etes vous sur de vouloir retirer le type "'+re+'" ?(cela entraine la suppression de ses composants)'))
        {

            $.post(
                'modules/retype.php', // Un script PHP que l'on va cr??er juste apr??s
                {
                    retype : re  // Nous r??cup??rons la valeur de nos input que l'on fait passer ?? connexion.php
                },
    
                function(data){
                $(".result").html(data)
            
                },
                'html'
            );
        }
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

