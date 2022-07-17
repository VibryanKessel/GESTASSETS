
<?php 
$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";

require("../conn.php");
?>

<?php
require "tables.php";
?>
<?php 
        $id= $_POST['id'];
        $type= $_POST['type'];
        $fsseur= $_POST['fsseur'];
        $etat= $_POST['etat'];
        $date= $_POST['date'];
        $garantie= $_POST['garantie'];
?>

<?php
    $req = $con->prepare('UPDATE '.$table1.' SET '.$champ12.'="'.$type.'",'.$champ14.'="'.$fsseur.'",'.$champ15.'="'.$etat.'",'.$champ17.'="'.$garantie.'",'.$champ16.'="'.$date.'" WHERE '.$champ11.'="'.$id.'"');
    $req->execute();

?>
