	<meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="../../font-awesome-4.7.0/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="../../bootstrap-3.3.7-dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../bootstrap-4.0.0-dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../bootstrap-5.0.0-dist/css/bootstrap.css">
<script src="../../jquery/jquery-3.5.1.js"></script>

<style type="text/css">

	.popup,.body
	{
		/*display: none;*/
	}
	@media only screen  and (max-width: 700px)
	{
		.submit,.reset
	{
		padding-left: .5em;
	}
	
	}

	@media only screen  and (max-width: 1000px)
	{
	.submit,.reset
	{
		padding-left: .5%;
		font-size: .5em;
	}

	}

	@media only screen  and (min-width: 1001px)
	{
	.submit,.reset
	{
		font-size: 1em;
	}
	}
	.popup
	{
		transition: 2s top;
		height: 50vh;
		box-shadow: 5px 2px 5px 1px rgba(0,0,0,.6) ;
	    background:-webkit-linear-gradient(left,#D82F84 5%,purple 20%,blue 200%);
		display: flex;
		flex-wrap: wrap;
		position: fixed;
		z-index: 200;
		border: solid black 2px;
		width: 50vw;
		top: -100vh;
		left: 25vw;
		padding-top:3%;  
	}
	.body
	{
				top: 0;
		filter: blur(5px);	
		z-index: 199;
		position: absolute;
		height: 100vh;
		width: 100vw;
		background: rgba(255,255,255,.7);
	}

	.submit,.reset
	{
		height: 25%;
		width: 25%;
		border-radius: 10px;
	}
	.tbpopup tr td
	{
		display: flex;
		flex-wrap: wrap;
		font-size: 5vh;
	}
	
	.tblpopup
	{
		display: flex;
		flex-wrap: wrap;
	}
</style>
<div class="body">
</div>
<div id="popup" class="container popup col-12">
	<table class="container tbpopup">
		<tr>
			<td>
	Cet asset est il compose d'element remplacables?
			</td>
		</tr>
	</table>
	<center class="container">
	<button type="submit" name="submit"  class="submit btn btn-dark"><center>OUI</center></button>
	<button type="reset" class="reset btn btn-dark"><center>NON</center></button>
	</center>
</div>
