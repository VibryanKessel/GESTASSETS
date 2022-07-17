<?php 
try
{
    $con=new pdo("mysql:host=".$host.";dbname=".$dbname,$user,$pw);
}catch(Exception $ex){
try
{
    $con= mysqli_connect($host,$user,$pw,$dbname);
}catch(Exception $ex){
try{
    $u= mysql_connect($host,$user,$pw);
    $con=mysql_select_db($u,$dbname);    
}catch(Exception $ex){
echo $ex->getMessage();
}
}
}
?>
 <?php

 
// $host="";
// $dbname="";
// $user="";
// $pw="";
// $table="";
// $champ="";
 ?>