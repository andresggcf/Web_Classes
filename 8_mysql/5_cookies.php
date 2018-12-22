<?php

	//coockie para dejar la sesion iniciada por 24 horas
	setcookie("customerId", "1234", time()+60*60*24);


	// Actualizar coockie
	$_COOKIE["customerId"] = "test";

	echo $_COOKIE["customerId"];


	//eliminar cookies
	setcookie("customerId", "1234", time()-60*60*24);

?>