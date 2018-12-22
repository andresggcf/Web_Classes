<?php
/*php.ini tiene los archivos de inicialización de php y errores*/

//conectar la base de datos de mySQL con la siguiente funcion
//parametros: servidor, usuario, clave, base de datos
	$link = mysqli_connect("localhost","root","root","8_users");

	if (mysqli_connect_error()){

		die("there was an error connecting to database");
	}


//query se escribira en SQL
	$query = "SELECT * FROM users";

//ejecutamos el query en el php para imprimirlo en la pagina
	if($result = mysqli_query($link, $query)){
		$row=mysqli_fetch_array($result);
		
		echo "your email is ".$row['email']." and your password is ".$row['password'];
	}

?>