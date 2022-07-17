<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form>
	<div class="container-fluid input-group">
	<select required  class="text-light fs-3 fw-normal" id="etat">
  <option selected><?php echo $_GET[$champ15];?></option> 

  <?php 
    if ($_GET[$champ15]=="BON") {
  ?>
  <option><?php echo $_GET[$champ15];?></option> 
  <option>DEFECTUEUX</option> 
  <option>EN PANNE</option>
  <?php
    }
  ?>

  <?php 
    if ($_GET[$champ15]=="DEFECTUEUX") {
  ?>
  <option><?php echo $_GET[$champ15];?></option> 
  <option>BON</option> 
  <option>EN PANNE</option>
  <?php
    }
  ?>

  <?php 
    if ($_GET[$champ15]=="EN PANNE") {
  ?>
  <option><?php echo $_GET[$champ15];?></option> 
  <option>DEFECTUEUX</option> 
  <option>BON</option>
  <?php
    }
  ?>
</select>
	</div>
</form>

</body>
</html>