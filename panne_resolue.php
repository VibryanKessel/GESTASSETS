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
    <title>OPERATIONS SUR ASSETS</title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="recherche/css/stylerechercheaccueil.css">
<!-- <link rel="stylesheet" type="text/css" href="css/styleaccueil.css"> -->
<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-dist/css/bootstrap.css">
    <script src="bootstrap-5.0.0-dist/js/bootstrap.js"></script>
<script src="jquery/jquery-3.5.1.js"></script>
</head>
<body>

<?php require "modules/tables.php"; ?>

<?php  
#-----------------------recuperer la description de la panne---------------------------

$convert=$con->query('SELECT * FROM '.$table9.' WHERE '.$champ91.'="'.$_GET['idpanne'].'"');
$into=$convert->fetch();

#--------------------------------------------------------------------------------------
?>


<center>
    
<div class="corps container-fluid">
    <div class="tablediv">
        <form method="post">
            <table void class="table1 table-responsive-md" cellspacing="0">
                <tr>
                    <td><label class="fw-bold  fs-3 text-light" for="mat">MATRICULE DE L'IT :</label></td>
                    <td><input autocomplete="off" required id="mat" class="form-control h-100 fs-3" maxlength="6" type="text"></td>
                </tr>

                <tr>
                    <td><label class="fw-bold  fs-3 text-light" for="panne">DESCRIPTION PANNE:</label></td>
                    <td>
                        <textarea text-align='center' id="textpanne" class="w-100 fs-2" disabled>
                            <?php echo $into[$champ92]; ?>   
                        </textarea>
                    </td>
                </tr>

                <tr>
                    <td><label class="fw-bold  fs-3 text-light" for="solution">DESCRIPTION RESOLUTION:</label></td>
                    <td>
                     <textarea class="addpanne w-100 fs-1" id="textsolution" placeholder="Je n'ai pas trouve une solution associee dans la liste ci-dessous" oninput="description()"></textarea>
                     <select  id="solution" class="form-control h-50 fs-3"></select>
                 </td>
                </tr>


	            <tr>
	                <td><label class="fw-bold  fs-3 text-light" for="periode">DATE :</label></td>
	                <td><input autocomplete="off" id="periode" class="form-control h-100 fs-3" readonly type="text"></td>
	            </tr>

                <tr>
                        <td><input id="idcas" style="visibility: hidden;" value="<?php echo $_GET['idcas'] ?>"></td>
                        <td><input id="idpanne" style="visibility: hidden;" value="<?php echo $_GET['idpanne'] ?>"></td>
                </tr>
                <tr>
                    <td><center>
                        
                        <input  type="submit" id="submit" value="ENREGISTRER">
                    </center>
                    </td>
                    <td>
                        <input  type="reset" value="ANNULER" >
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</center>
</body>
</html>
<script>
panne=""

solution=""

function description() 
{
    solution=document.getElementById("textsolution").value
    document.getElementById('solution').selectedIndex=0
}


function fixed()
{
    document.getElementById('nav').style.position='fixed'
}

$(document).ready(function(){



    $("#solution").click(function(e){

    e.preventDefault();
    document.getElementById('textsolution').value=""

    if(document.getElementById('solution').selectedIndex>0)
        solution=document.getElementById('solution').options[this.selectedIndex].text;
    });

    
 $("#submit").click(function(e){
        e.preventDefault();

if(solution!="")
{
    if (confirm("Valider la resolution?")) 
    {
            $.post(
                'modules/phppanne.php', // Un script PHP que l'on va créer juste après
                {
                    mat_it : $("#mat").val(), 
                    idpanne:$("#idpanne").val(),
                    idcas:$("#idcas").val(),
                    solution : solution, 
                    periode : $("#periode").val()
                },

            function(data){
                if(data==1)
                {
                    window.location.assign("tblcas.php")
                }else{
                    alert("Matricule non reconnu")
                }
                        },
            'text'
         );
    }

}else{
    alert("Veuillez decrire la solution a la panne!!")
}
        });



     $("#solution").focus(function(e){
        e.preventDefault();
  
    $.post(
            'modules/refreshsolution.php', // Un script PHP que l'on va créer juste après  
            {

            },

            function(data){

            $("#solution").html(data)
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

