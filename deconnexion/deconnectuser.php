<?php 
session_start();
session_destroy();
 ?>
 <body onload="grow()">

<style type="text/css">
   *{
   		overflow-y: hidden;
   		overflow-x: hidden;
	}
	#logo
	{
		height:0;
		width: 0;
		position: absolute;
		top: 50vh;
		left: 50vw;
		z-index: 0;
		transition: 3s all ease;
	}
</style>

<img src='../images/logo6.jpg' id='logo'>

<script type='text/javascript'>
function grow() 
	{
	document.getElementById('logo').style.width='100vw';
	document.getElementById('logo').style.top=0;
	document.getElementById('logo').style.left=0;
	document.getElementById('logo').style.height='100vh';
	document.getElementById('logo').style.transform='rotateZ(360deg)';
	}
setTimeout(
	"window.location.assign('../portail/authentification.php');",4000
	);
</script>
 </body>

