<?php 
$host="localhost";
$dbname="parc_informatique";
$user="root";
$pw="";

require("../conn.php");
?>


<?php require "tables.php"; ?>

<?php 
$options=$con->query("SELECT * FROM ".$table2.",".$table3.
									" WHERE ".
									$table2.".".$champ22."="."'".$_GET[$champ12]."'"." AND ".
									$table3.".".$champ32."=".$table2.".".$champ21
						);
?>

<form method="post">
	<select name="select">
<?php 
while ($option=$options->fetch()) {
?>
<option><?php echo $option[$champ33]; ?></option>
<?php
}
 ?>
	</select>
<input type="submit" name="submit" value="selectionner">
<input type="submit" name="ok" value="c'est bon">
      </form>
    <script type="text/javascript">
      alert("Veuillez specifier le composant dont l' etat est '<?php echo $_GET['new'];?>'")
    </script>
<?php 
if (isset($_POST["submit"])) 
{
?>
   


<?php 
if ($_GET["new"]=="DEFECTUEUX") $new = $champ34;

if ($_GET["new"]=="EN PANNE") $new = $champ36;

if ($_GET["new"]=="BON") $new = $champ35;

if ($_GET["old"]=="DEFECTUEUX") $old = $champ34;

if ($_GET["old"]=="EN PANNE") $old = $champ36;

if ($_GET["old"]=="BON") $old = $champ35;


$maj_etat = $con->prepare('UPDATE '.$table1.' SET '.$champ15.'="'.$_GET["new"].'" WHERE '.$champ11.'="'.$_GET[$champ11].'"');
$maj_etat->execute();

$maj_stock=$con->prepare("UPDATE ".$table2.",".$table3.
									" SET ".$table3.".".$new."=((SELECT ".$table3.".".$new.")+1)".
									" WHERE ".
									$table2.".".$champ22."="."'".$_GET[$champ12]."'"." AND ".
									$table3.".".$champ32."=".$table2.".".$champ21." AND ".
									$table3.".".$champ33."="."'".$_POST["select"]."'"
						);
$maj_stock->execute();

$maj_stock=$con->prepare("UPDATE ".$table2.",".$table3.
									" SET ".$table3.".".$old."=((SELECT ".$table3.".".$old.")-1)".
									" WHERE ".
									$table2.".".$champ22."="."'".$_GET[$champ12]."'"." AND ".
									$table3.".".$champ32."=".$table2.".".$champ21." AND ".
									$table3.".".$champ33."="."'".$_POST["select"]."'"
						);
$maj_stock->execute();

?>

<?php 
}

if (isset($_POST["ok"])) 
{ 
	header("location:../assets.php");
}

?>