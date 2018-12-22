<?php


	//condicion que tiene los datos del textarea que se obtuvo po ajax, 
	//inicia la sesión y guarda esos datos a la base de datos mediante
	//mysql en el query


	session_start();
	if(array_key_exists("content", $_POST)){

		/*conectar la base de datos de mySQL con la siguiente funcion
		parametros: servidor, usuario, clave, base de datos*/
  		include("connection.php");

		$query = "UPDATE `users` SET `text`='".mysqli_real_escape_string($link, $_POST['content'])."' WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";

		mysqli_query($link, $query);
		
	}

?>