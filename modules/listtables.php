<?php session_start(); ?>
<?php
 
$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";

require("../conn.php");
?>

<?php require "tables.php";?>


<?php

if($_POST["champ"]==1)$choix="type";
if($_POST["champ"]==2)$choix="matricule_it";
if($_POST["champ"]==3)$choix="fournisseur";
if($_POST["champ"]==4)$choix="garantie";
$champs=[$champ11,$champ12,$champ16,$champ17,$champ14,$champ15,$champ13];

for($c=0;$c<6;++$c)
{
    if($champs[$c]==$choix)break;
}

$req=$con->query("SELECT DISTINCT ".$choix." FROM ".$table1." ORDER BY ".$choix." ASC");
$i=0;
while($res=$req->fetch())
{
    $champ[$i]=$res[$choix];
    ++$i;
}
?>

<?php  
for ($j=0; $j < $i; $j++) {
    $req=$con->query("SELECT* FROM ".$table1." WHERE ".$choix."='".$champ[$j]."'");
    $n=0;
    while($res=$req->fetch()) ++$n;
    $r=$con->query("SELECT* FROM ".$table1." WHERE ".$choix."='".$champ[$j]."' ORDER BY ".$choix." ASC");
?>
    <table border="2" class="container-md table table-light">
<div class="container-md titre text-uppercase text-center fw-bold fs-lg-1 "><?php echo $champ[$j].'('.$n.')'; ?></div>
            <tr>
<?php  
if($choix=="type"){
?>
                <th>ID MATERIEL</th>
                <th>DATE</th>
                <th>GARANTIE</th>
                <th>FOURNISSEUR</th>
                <th>ETAT</th>
                <th>DEPLOYEUR</th>
                <th></th>
                <th></th>
<?php if ($_SESSION["role"]==1)   echo" <th></th>";
 ?>                
<?php 
}
?>
<?php  
if($choix=="fournisseur"){
?>
                <th>ID MATERIEL</th>
                <th>TYPE</th>
                <th>DATE</th>
                <th>GARANTIE</th>
                <th>ETAT</th>
                <th>DEPLOYEUR</th>
                <th></th>
                <th></th>
<?php if ($_SESSION["role"]==1)   echo" <th></th>";?>        
 <?php 
}
?>
<?php  
if($choix=="matricule_it"){
?>
                <th>ID MATERIEL</th>
                <th>TYPE</th>
                <th>DATE</th>
                <th>GARANTIE</th>
                <th>FOURNISSEUR</th>
                <th>ETAT</th>
                <th></th>
                <th></th>
<?php if ($_SESSION["role"]==1)   echo" <th></th>";?>        
 <?php 
}
?>
<?php  
if($choix=="garantie"){
?>
                <th>ID MATERIEL</th>
                <th>TYPE</th>
                <th>DATE</th>
                <th>FOURNISSEUR</th>
                <th>ETAT</th>
                <th>DEPLOYEUR</th>
                <th></th>
                <th></th>
<?php if ($_SESSION["role"]==1)   echo" <th></th>";?>        
 <?php 
}
?>
            </tr>
<?php 
while($res2=$r->fetch())
{
           echo '<tr>';
    for($k=0;$k<7;++$k)
    {
        if($k!=$c){
?>
                <td><?php echo $res2[$champs[$k]]; ?></td>
<?php
}
}
?>
<td></td>
<?php
    if ($_SESSION["role"]==1) {
            echo'
        <td><a href="modules/Editionassets.php?'.$champ11.'='.$res2[$champ11].'&'.$champ12.'='.$res2[$champ12].'&'.$champ13.'='.$res2[$champ13].'&'.$champ14.'='.$res2[$champ14].'&'.$champ15.'='.$res2[$champ15].'&'.$champ16.'='.$res2[$champ16].'&'.$champ17.'='.$res2[$champ17].'" class="btn btn-secondary">Modifier</a></td>
        <td><a onclick=\'if(confirm("Etes-vous sur de vouloir supprimer l asset '.$res2[$champ11].'?"))window.location.assign("modules/Suppressionassets.php?'.$champ11.'='.$res2[$champ11].'");\' class="btn btn-secondary">Supprimer</a></td>
            </tr>';
    }else{
        echo'
        <td><a href="modules/Editionassets.php?'.$champ11.'='.$res2[$champ11].'&'.$champ12.'='.$res2[$champ12].'&'.$champ13.'='.$res2[$champ13].'&'.$champ14.'='.$res2[$champ14].'&'.$champ15.'='.$res2[$champ15].'&'.$champ16.'='.$res2[$champ16].'&'.$champ17.'='.$res2[$champ17].'" class="btn btn-secondary">Modifier</a>
        </td>
        </tr>';
    }
}
 ?>
    </table>
<?php 
}
?>
