<?php
	session_start();

	if(array_key_exists("id", $_COOKIE)){
		$_SESSION['id'] = $_COOKIE['id'];
	}

	//revisamos si hay una sesion iniciada
	if(array_key_exists("id", $_SESSION)){
		echo '<p>Sesión iniciada <a class="btn btn-primary" href="diario.php?logout=1" role="button">Salir</a></p>';
	}

	else{
		header("Location: diario.php");
	}

	include("header.php");

?>

<div class="container start1">
	<textarea  id="diario" class="form-control"></textarea>
</div>


<?php	include("footer.php");?>