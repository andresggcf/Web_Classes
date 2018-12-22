<?php

	//método para almacenar las claves de forma segura.

	//hash para las claves

	$row['id'] = 73

	echo md5("password");




	//-------------
	//para php 5.5
	//-------------


	//generar un hash para la clave "mypassword"
	$hash = password_hash("mypassword", PASSEORD_DEFAULT);

	echo $hash;
	echo <br><br>;

	//verificamos si la clave "mypassword" coincide con el hash.
	if (password_verify('mypassword', $hash)){
		echo 'password is valid';
	}else{
		echo 'password invalid';
	}


?>