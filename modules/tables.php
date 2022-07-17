
<?php

$table1="assets";
$champ11="id_asset";
$champ12="type";
$champ13="matricule_IT";
$champ14="fournisseur";
$champ15="etat";
$champ16="date";
$champ17="garantie";

?>

<?php

$table2="type_asset";
$champ21="numero";
$champ22="nom";
$champ23="stock";

?>

<?php

$table3="composants";
$champ31="num_composant";
$champ32="ref_type";
$champ33="libelle";
$champ34="nbre_defectueux";
$champ35="nbre_bon";
$champ36="nbre_panne";

?>

<?php

$table4="fournisseur";
$champ41="id_fsseur";
$champ42="libelle";

?>

<?php 

$table5="utilisateurs";
$champ51="matricule";
$champ52="nom";
$champ53="prenom";
$champ54="password";
$champ55="role";

?>

<?php 

$table6="details_livraison";
$champ61="id_fsseur";
$champ62="num_groupe";
$champ63="quantite";
$champ64="frais";
$champ65="mat_reception";
$champ66="periode";

?>

<?php 

$table8="resolutions_panne";
$champ81="matricule_IT";
$champ82="id_panne";
$champ83="date";
$champ84="solution";
$champ85="ref_cas";
?>

<?php 

$table9="panne";
$champ91="id_panne";
$champ92="commentaire";

?>

<?php 

$table10="cas_de_panne";
$champ101="matricule_agent";
$champ102="id_panne";
$champ103="statut";
$champ104="date";
$champ105="id_cas";
?>

<?php 

$table11="agent";
$champ111="matricule";
$champ112="service";

?>
