<?php

/*---------------------------------------------------------------
---------------------------------------------------------------*/

  session_start();

  //echo $_SESSION['user'];

  //esta condición revisa si hay una sesion activa el usuario la cierra, se borra la cookie
  if(array_key_exists("logout", $_GET)){
    unset($_SESSION);
    setcookie("id","",time()-60*60);
    $_COOKIE['id'] = "";
  }

  //si no es cerrada, entonces redirecciona esta página a loggeado.php
  else if(array_key_exists("id", $_SESSION) or array_key_exists("id", $_COOKIE)){
    header("Location: loggeado.php");

  }


/*---------------------------------------------------------------
---------------------------------------------------------------*/

/*---------------------------------------------------------------
---------------------------------------------------------------*/

/*php.ini tiene los archivos de inicialización de php y errores*/

/*conectar la base de datos de mySQL con la siguiente funcion
parametros: servidor, usuario, clave, base de datos*/
  include("connection.php");



  /*Revisamos si hay algo escrito en el formulario*/
  if(array_key_exists("submit", $_POST)){
   if($_POST['email']==''){
      echo '<div class="alert alert-danger" role="alert">Se necesita un correo electronico</div>';
    }

   else if($_POST['password']==''){
      echo '<div class="alert alert-danger" role="alert">Se necesita una contraseña</div>';
    }

/*-------------------------------------------------------------------
----------------codigo query de MYSQL está comentado porque----------
----------------si lo ejecuto siempre, se actualizara la ------------
----------------base de datos----------------------------------------
---------------------------------------------------------------------*/

    else{

      //if si va a crear una cuenta nueva
      if($_POST["signup"] == 1){
        $query = "SELECT id FROM users where email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
      
        $result = mysqli_query($link, $query);  
      
      

/*-----------------------------------------------------------------------
-------------------------------------------------------------------------
-------------------------------------------------------------------------
-------------------------------------------------------------------------*/
      
        //Condicion que retorna el numero de filas que hay en el query $result, 
        //si hay mas de 0 es porque algo existe en ese query que haya retornado 
        //la variable $query

        if (mysqli_num_rows ($result) > 0){
          echo '<div class="alert alert-danger" role="alert"> El correo ya existe </div>';
        }

        //si esa condición no se cumple, entonces agregamos el correo a la base de datos

        else{
          $query = "INSERT INTO users (email, password) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."','".mysqli_real_escape_string($link, $_POST['password'])."')";

          if(mysqli_query($link, $query)){


            //Crearemos una clave segura creando un hash al numero de id del usario ej id = 3
            //el hash generado es 3eq233RAs y hacemos un hash de la clave, concatenamos y agregamos
            //la nueva cadena a la fila de password en la base de datos.

            $query2 = "UPDATE users SET password = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";
            mysqli_query($link, $query2);


            //Cookies para verificar si la persona quiere mantener con la sesion
            //iniciada o no.
            $_SESSION['id'] = mysqli_insert_id($link);
            if($_POST['stayLogged'] == '1'){
              setcookie("id", mysqli_insert_id($link), time()+60*60*24*365);
            }
            
            header("Location: loggeado.php");

          }

          else{
            echo '<div class="alert alert-danger" role="alert"> Hubo un problema, vuelve a intentarlo. </div>';
          }

        }

      }

      //else... si va a iniciar sesion
      else{
        $query = "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
        $result = mysqli_query($link, $query);

        $row = mysqli_fetch_array($result);

        //Revisamos si las claves coinciden
        if (isset($row)){

          echo "id ".$row['Id']."<br>";
          echo "password ".$_POST['password'];

          $hashedPass = md5(md5($row['Id']).$_POST['password']);

          if ($hashedPass == $row['password']){

            //Cookies para verificar si la persona quiere mantener con la sesion
            //iniciada o no.
            $_SESSION['id'] = $row['Id'];

            if($_POST['stayLogged'] == '1'){
              setcookie("id", $row['Id'], time()+60*60*24*365);
            }

            header("Location: loggeado.php");

          } 
          else
             echo '<div class="alert alert-danger" role="alert"> La clave está errada. </div>';

        }

        else{

            echo '<div class="alert alert-danger" role="alert"> No se pudo encontrar ese correo. </div>';
        }

      }

    }

  }


?>

<?php include("header.php") ?>


  <body>

  <div class="container start">

  <div class="card w-100" id="signup_form">
    <div class="card-body">
      <h4 class="card-title">DIARIO SECRETO</h5>
      <p class="card-text">Ingresa tu correo y contraseña para Registrarte</p>
        <form method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="email" id="email_text" placeholder="Correo Electrónico">
            <input type="password" class="form-control" name="password" id="passw_text" placeholder="Contraseña">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="stayLogged" value=1> Mantener sesión activa
              </label>
            </div>
            <input type="hidden" name="signup" value=1">
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Crear!</button>
          <p id="log_in_p">Ya estás registrado? <button type="button" class="btn btn-link toggle_forms" id="show_login_form">Inicia sesión</button></p>
        </form>
    </div>
  </div>

  <div class="card w-100" id="login_form">
    <div class="card-body">
      <h4 class="card-title">DIARIO SECRETO</h5>
      <p class="card-text">Ingresa tu correo y contraseña</p>
        <form method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="email" id="email_text" placeholder="Correo Electrónico">
            <input type="password" class="form-control" name="password" id="passw_text" placeholder="Contraseña">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="stayLogged" value=1> Mantener sesión activa
              </label>
            </div>
            <input type="hidden" name="signup" value=0">
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Iniciar!</button>
          <p id="log_in_p">No estás registrado? <button type="button" class="btn btn-link toggle_forms" id="show_login_form">Crea una cuenta</button></p>
        </form>
    </div>
  </div>
  </div>
  
  <?php include("footer.php") ?>