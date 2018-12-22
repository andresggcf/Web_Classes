<?php

/*conectar la base de datos de mySQL con la siguiente funcion
parametros: servidor, usuario, clave, base de datos*/
  $link = mysqli_connect("localhost","root","root","7_secret");

  if (mysqli_connect_error()){

    die("there was an error connecting to database");
  }

?>