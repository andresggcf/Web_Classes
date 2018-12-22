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



//funcion para INSERTAR a una tabla
	//$query = "INSERT INTO users (user_name, email, password) VALUES ('tommy_p', 'tommy@gmail.co.uk', 'ssu2d99asiuuk')";




//funcion para ACTUALIZAR un elemento existente (limit, limita el numero de columnas que va a actualizar)
	//$query = "UPDATE users SET email ='robpercival@gmail.com' WHERE id = 1 LIMIT 1";

	//$query = "UPDATE users SET password = 'QWsda825' WHERE email = 'robpercival@gmail.com' LIMIT 1"; 



//esta función ejecuta el query en el $link que es el que enlaza a la base de datos
	mysqli_query($link, $query);
/*-----------------------------------------------------------------------
-------------------------------------------------------------------------
-------------------------------------------------------------------------
-------------------------------------------------------------------------*/


//query se escribira en SQL
	$query = "SELECT * FROM users";

//ejecutamos el query en el php para imprimirlo en la pagina
	if($result = mysqli_query($link, $query)){
		$row=mysqli_fetch_array($result);
		
		echo "your email is ".$row['email']." and your password is ".$row['password'];
	}

?>