<?php

/*ver archivo 4_session.php, de aqui se basa el siguente codigo
---------------------------------------------------------------
---------------------------------------------------------------*/

  session_start();

  //echo $_SESSION['user'];


/*---------------------------------------------------------------
---------------------------------------------------------------*/

/*php.ini tiene los archivos de inicialización de php y errores*/

//conectar la base de datos de mySQL con la siguiente funcion
//parametros: servidor, usuario, clave, base de datos
  $link = mysqli_connect("localhost","root","root","8_users");

  if (mysqli_connect_error()){

    die("there was an error connecting to database");
  }



/*Revisamos si hay algo escrito en el formulario*/

  if(array_key_exists('user', $_POST) or array_key_exists('email', $_POST) or array_key_exists('password', $_POST)){

    if($_POST['user']==''){
      echo '<div class="alert alert-danger" role="alert"> The username is required</div>';
    }

    else if($_POST['email']==''){
      echo '<div class="alert alert-danger" role="alert"> The email address is required</div>';
    }

    else if($_POST['password']==''){
      echo '<div class="alert alert-danger" role="alert"> The password is required</div>';
    }

/*-------------------------------------------------------------------
----------------codigo query de MYSQL está comentado porque----------
----------------si lo ejecuto siempre, se actualizara la ------------
----------------base de datos----------------------------------------
---------------------------------------------------------------------*/


    else{
      $query = "SELECT id FROM users where email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
      $query_2 = "SELECT id FROM users WHERE user_name = '".mysqli_real_escape_string($link, $_POST['user'])."'";

      $result = mysqli_query($link, $query);
      $result_2 = mysqli_query($link, $query_2);

 

/*-----------------------------------------------------------------------
-------------------------------------------------------------------------
-------------------------------------------------------------------------
-------------------------------------------------------------------------*/


//funcion que retorna el numero de filas que hay en el query $result, si hay mas de 0 es porque algo existe 
//en ese query que haya retornado la variable $query

      if (mysqli_num_rows ($result) > 0){
        echo '<div class="alert alert-danger" role="alert"> The email has been taken </div>';
      }

      else if (mysqli_num_rows ($result_2) > 0){
         echo '<div class="alert alert-danger" role="alert"> The username has been taken </div>';
      }
      else{
        $query = "INSERT INTO users (user_name, email, password) VALUES ('".mysqli_real_escape_string($link, $_POST['user'])."','".mysqli_real_escape_string($link, $_POST['email'])."','".mysqli_real_escape_string($link, $_POST['password'])."')";

        if(mysqli_query($link, $query)){

          echo '<div class="alert alert-success" role="alert"> You have been signed up!</div>';

          //sesion del archivo 4_session.php
          //iniciamos una sesion nueva con el correo
          $_SESSION['email'] = $_POST['email'];
          //redireccionamos a la nueva página.
          header("Location: 4_session.php");

        }
        else{
          echo '<div class="alert alert-danger" role="alert"> There was a problem, please try again later. </div>';
        }
      }
    }
  }

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Form MYSQL</title>


    <style type="text/css">
    .container{
      padding-right: 100px;
      padding-left: 100px;
    }
    
    .start{
      height:100%;
      padding-top: 8%;
      width: 600px;
    }

    #clima{
      padding-top: 30px;
    }

      
    </style>

  </head>
  <body>
  <div class="container start">
  <div class="card w-100">
    <div class="card-body">
      <h4 class="card-title">Formulario</h5>
      <p class="card-text">Ingresa tu usuario, correo y contraseña para inscribirte</p>
        <form method="post">
          <div class="form-group">
            <label for="city_text">Usuario</label>
            <input type="text" class="form-control" name="user" id="user_text" placeholder="e.g andres">

            <label for="email_text">Correo</label>
            <input type="text" class="form-control" name="email" id="email_text" placeholder="e.g andres@email.com">

            <label for="passw_text">Contraseña</label>
            <input type="password" class="form-control" name="password" id="passw_text">
          </div>
          <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
  </div>

  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>