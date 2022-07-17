<?php include "../icon/addicon.php"; ?>
<style type="text/css">
	*
	{
		overflow-y: hidden;
		overflow-x: hidden;
	}

	img
	{
		position: absolute;
		top: 0;
		left: 0;
		height: 100vh;
		width: 100vw;
		transition: 3s all ease; 
	}
	#wedo
	{
		z-index: 0;
		height: 0;
	}
	#logo
	{
		opacity: 0;
		z-index: 1;
	}
	#wecare
	{
		z-index: 2;
		height: 0;
	}
	#loading
	{
		opacity: 1;
		transition: 0s opacity;
		z-index: 3;
	}

</style>
<center>
<img src="../images/loading.gif" id="loading">
<img src="../images/logo5.png" id="logo">
<img src="../images/wedo.png" id="wedo">
<img src="../images/wecare.png" id="wecare">
</center>
<script type="text/javascript">
	setTimeout(
		function ()
		{
			document.getElementById("loading").style.opacity=0
			document.getElementById("logo").style.opacity=1

				setTimeout(
					function ()
						{
							document.getElementById("logo").style.opacity=0
							document.getElementById("wedo").style.height="100vh"

											setTimeout(
												function ()
													{
														document.getElementById("wedo").style.height=0
														document.getElementById("wedo").style.top="100vh"
														document.getElementById("wecare").style.height="100vh"
																			setTimeout(
																				function ()
																					{
																						window.location.assign("../accueil.php")
																					},4000
																					)
													},3000
													)
						},3000
						)
		},4000
		)
</script>
	
