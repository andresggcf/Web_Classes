<?php
/*php.ini tiene los archivos de inicialización de php y errores*/

//conectar la base de datos de mySQL con la siguiente funcion
//parametros: servidor, usuario, clave, base de datos
	$link = mysqli_connect("localhost","root","root","8_users");

	if (mysqli_connect_error()){

		die("there was an error connecting to database");
	}





/*-------------------------------------------------------------------
----------------codigo query de MYSQL está comentado porque----------
----------------si lo ejecuto siempre, se actualizara la ------------
----------------base de datos----------------------------------------
---------------------------------------------------------------------*/

	//$query = "SELECT * FROM users";

	//$query = "SELECT * FROM users WHERE id = 1";


	//LIKE busca todo lo que contenga lo que está escrito en el string
	//$query = "SELECT * FROM users WHERE email LIKE '%gmail.co.uk'";
	//$query = "SELECT * FROM users WHERE email LIKE '%p%'";


	//$query = "SELECT * FROM users WHERE id >= 2";

	//$query = "SELECT email FROM users WHERE id >= 2";

	//$query = "SELECT email FROM users WHERE id >= 2 AND email LIKE '%ki%'";




	// Esta funcion elimina cualquier caracter extraño como "O'Brian" o cosas asi con variables 
	//mysqli_real_escape_string($link, variable)




	//$name = "tommy_p";

	//$query = "SELECT email FROM users WHERE user_name ='".$name."'";




/*-----------------------------------------------------------------------
-------------------------------------------------------------------------
-------------------------------------------------------------------------
-------------------------------------------------------------------------*/



//ejecutamos el query en el php para imprimirlo en la pagina
	if($result = mysqli_query($link, $query)){

		//llamamos todas las filas de la tabla con este ciclo
		while($row=mysqli_fetch_array($result)){
			print_r($row);
		}
	}

?>