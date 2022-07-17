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
    <title>ACCUEIL</title>
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
<div class="baracc container-fluid col-12 d-flex">
<a href="nvlivraison.php" class="btn  col-3 fs-2"><center>STOCKER DU MATERIEL</center></a><a href="listlivraison.php" class="btn  col-3 fs-2">DERNIERES LIVRAISONS</a><a class="panne btn col-3 fs-2"><center>DEPLOYER UN ASSET</center></a><a class="btn  col-3 fs-2" href="panne_declaree.php"><center>PANNE</center></a>
</div>
    
    <div class="container entete">
    <table class="table2">
        <tr>
    <td> <label class="fw-bold fs-3">TYPE</label></td>
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
                    <td><label class="fw-bold  fs-3 " for="id">IDENTIFIANT ASSET</label>:</td>
                    <td><input autocomplete="off" id="id" class="form-control h-50 fs-3" type="text"></td>
                </tr>

                <tr>
                    <td><label class="fw-bold  fs-3 " for="mat">MATRICULE DE L'IT </label>:</td>
                    <td><input autocomplete="off" required id="mat" class="form-control h-50 fs-3" type="text" maxlength="6"></td>
                </tr>

                <tr>
                    <td><label class="fw-bold  fs-3 " for="mdp">MOT DE PASSE </label>:</td>
                    <td><input autocomplete="off" required="" id="mdp" class="form-control h-50 fs-3" type="password"></td>
                </tr>
            
                <tr>
                    <td><label class="fw-bold  fs-3 " for="fsseur">FOURNISSEUR </label>:</td>
                    <td>
                        <select required id="fsseur" class="h-50"></select>
                    </td>
                </tr>
            <tr>
                <td><label class="fw-bold  fs-3 " for="garantie">EXPIRATION DE LA GARANTIE </label>:</td>
                <td><input autocomplete="off" id="garantie"  class="form-control h-50 fs-3" type="date" min="<?php echo(date("Y-m-d")); ?>"></td>
            </tr>

            <tr>
                <td><label class="fw-bold  fs-3 " for="periode">DATE </label>:</td>
                <td><input autocomplete="off" id="periode" class="form-control h-50 fs-3" readonly type="text"></td>
            </tr>

            </table>
            <div class="container btndiv">
                    <input  type="submit" id="submit" value="ENREGISTRER">
                    <input  type="reset" value="ANNULER" >
            </div>
        </form>
    <div class="result"></div>
    <div  class="fixed-bottom">
        <a  id="nvtype" class="nvtype">Nouveau type d'asset</a>
        <?php
    if ($_SESSION["role"]==1) echo'<a  id="retype" class="retype">Retirer type d\'asset</a>';
         ?>
    </div>
</div>
    </div>
    
</body>
</html>
<script>
$(document).ready(function(){
type="";
fsseur="";
     $("#select").click(function(e){
        e.preventDefault();
    type=document.getElementById('select').options[this.selectedIndex].text;
    });

     $("#fsseur").click(function(e){
    fsseur=document.getElementById('fsseur').options[this.selectedIndex].text;
    });
    
 $("#submit").click(function(e){
        e.preventDefault();
indexid=document.getElementById('select').selectedIndex;
indexfsseur=document.getElementById('fsseur').selectedIndex;
    if (indexfsseur>=1) {
        if (indexid>=1)
        {
    
          if (confirm('Etes vous sur de vouloir ajouter cet asset ?')) 
          {
            $.post(
                'modules/ajouter.php', // Un script PHP que l'on va créer juste après
                {
                    id : $("#id").val(), 
                    fsseur : $("#fsseur").val(),
                    mat : $("#mat").val(), 
                    type : type,
                    mdp : $("#mdp").val(),
                    periode : $("#periode").val(),
                    garantie : $("#garantie").val()

                },

            function(data){
            if(data==1)
            {
            alert("L' asset a bien ete enregistre");

            }
            if (data==0) {
            alert("L' insertion a echoue ");
            }
            if (data==2) {
            alert("Stock insuffisant ");
            }
                        
                        },
            'text'
         );
        }
        }else{
            alert("Veuillez choisir un type d' asset!!");
            }
        }else{
            alert("Veuillez choisir un fournisseur!!")
            }
        });


$("#nvtype").click(function(e){
    e.preventDefault();
    nv=prompt("Entrer le type d'asset a ajouter :");
    if (nv!=null&&nv!="") 
    {
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
    }
});

$("#retype").click(function(e){
    e.preventDefault();
    re=prompt("Entrer le type d'asset a enlever :");
    if (re!=null&&re!="") 
    {   
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
    }
});

$("#fsseur").focus(function(e){
        e.preventDefault();
  
    $.post(
            'modules/refreshfsseur.php', // Un script PHP que l'on va créer juste après  
            {

            },

            function(data){
            $("#fsseur").html(data)

            },
            'html'
         );
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

