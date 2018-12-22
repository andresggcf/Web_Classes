<?php

	session_start();

	//Sesión que permanecera iniciada mientras que el usuario no
	//cierre el navegador.
	//$_SESSION['user'] = 'andres';


	//echo $_SESSION['user'];

	if($_SESSION['email']){
		echo "you are logged in";
	}

	else{
		header("Location: 3.5_ejemplo_form.php");
	}

?>