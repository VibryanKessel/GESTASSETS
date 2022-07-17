<!DOCTYPE html>

<html>
<head>

	<title></title>
	<meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<body>

	<form method="post">
		<div class="input-group">
		<input type="search" title="Votre recherche" autocomplete="off" placeholder="Entrer un identifiant d'asset" class="page-link" id="search" onkeyup="document.getElementById('select').selectedIndex=0;">
        <div class="loupe page-link"><label for="search"><i class="fa fa-search display-5" aria-hidden="true"></i></label></div>
        <select required id="select" class="" onclick="document.getElementById('search').value=this.options[this.selectedIndex].text;">
        </select>
		</div>
	</form>

<br>
<br>
<div class="result container-fluid"></div>

</body>
</html>

<script>

$(document).ready(function(){


     $("#select").focus(function(e){
        e.preventDefault();
  
    $.post(
            'recherche/refreshoptions.php', // Un script PHP que l'on va créer juste après  
            {

            },

            function(data){
            $("#select").html(data);
            },
            'html'
         );

    });
    $("#search").keyup(function(e){
        e.preventDefault();
 
        $.post(
            'recherche/phpsearch.php', // Un script PHP que l'on va créer juste après
            {
                search : $("#search").val()  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
            },
 
            function(data){
 			$(".result").html(data);
         
            },
            'html'
         );
    });


        $("#select").click(function(e){
        e.preventDefault();
 
        $.post(
            'recherche/phpsearch.php', // Un script PHP que l'on va créer juste après
            {
                search : $("#search").val()  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
            },
 
            function(data){
            // $(".result").html(data);
         
            },
            'html'
         );
    });

});	
</script>