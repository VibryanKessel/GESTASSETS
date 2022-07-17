
<!DOCTYPE html>
<html>
<head>
<title></title>

<?php include "../icon/addicon.php"; ?>

<script src="../jquery/jquery-3.5.1.js"></script>
</head>
<body>

<div class="result"></div>

<script>

$(document).ready(function(){  

cpn=prompt("Entrer le nom du composant :");

 	if (confirm('Etes vous sur de vouloir ajouter le composant "'+cpn+'" ?')) 
 	{
if(cpn!="")
{
        $.post(
            'phpaddcomponents.php', // Un script PHP que l'on va créer juste après
            {
                nvcpn : cpn  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
            },
 
            function(data){

                $(".result").html(data);
            },
            'html'
         );
}else{
    alert("Impossible d\'ajouter cet element")   
    if(confirm("Ajouter un autre composant ?"))window.location.reload()

}
    }
    window.location.assign("../accueil.php");

});

// });
</script>
</body>
</html>

