<style type="text/css">
	@media only screen and (max-width: 804px)
	{
	#deconnect
	{
		left: 68vw;
	}
	}
	@media only screen and (min-width: 804px) and (max-width: 853px)
	{
	#deconnect
	{
		left: 60vw;
	}
	}
	@media only screen and (min-width: 854px) 
	{
		#deconnect
		{
			left: 70vw;
		}
	}


	#logo
	{
		height:0;
		width: 0;
		position: absolute;
		top: 50vh;
		left: 50vw;
		z-index: 0;
		transition: .1s all ease;
	}
@media only screen and (min-width: 670px)
{
	#deconnect
		{
		/*height: 5rem;*/
		/*border-radius: .5em;*/
		font-size: 1.3vw;
		width: 15vw;
		}
	
}

@media only screen and (max-width: 670px)
{
	#deconnect
		{
		font-size: 2.3vw;
		height: 2.5vh;
		width: 20vw;
		}
	
}
	#deconnect
	{

		outline: none;
		z-index: 99;
		float: right;
		/*left: 78vw;*/
		/*background: rgba(224,48,144,.8);*/
		background:#E91E63 ;
		/*color: white;*/
		font-weight: 800;
		transition: 1s color;
		transition: 1s background ;
		/*box-shadow: 1rem 1rem 5rem 1rem gray;*/
	}
	#deconnect:hover
	{
		border: solid #E91E63 .05rem ;
		background: white;
		color: #E91E63;
	}

</style>
<a class="btn float-end" title="deconnectez-vous" name="deconnect" id="deconnect">DECONNEXION</a>
<!-- <input type="submit" class="btn float-end " title="deconnectez-vous" id="deconnect" name="deconnect"  value="Se deconnecter"/> -->
<img src='images/logo3.png' id='logo'>

<script>
$(document).ready(function(){
$("#deconnect").click(function(e){
        e.preventDefault();
 	if (confirm('Souhaitez-vous vous deconnecter ?')) 
 	{
 		window.location.assign("deconnexion/deconnectuser.php");
 	}
    });
	});a
</script>