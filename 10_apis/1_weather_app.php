<?php  

$clima = "";
$error = "";

if (array_key_exists('city', $_GET)){

  $ciudad = $_GET['city'];
  //echo($ciudad);

  //quitamos todos los espacios posibles del texto
  $ciudad = str_replace(' ', '-', $ciudad);

  //todo en mayúsculas para imprimir en la pagina
  $ciudadCaps = strtoupper($_GET['city']);


  $urlContents = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$ciudad."&appid=fa21ec9e28c31eabcb22d4f6fffbac66");

  $arrayWeather = json_decode($urlContents, true);

  //print_r ($arrayWeather);

  $tempCelcius = round($arrayWeather['main']['temp'] -273.15);
  $windspeed = $arrayWeather['wind']['speed'];

  $clima = "The weather in ".$ciudad." is currently '". $arrayWeather['weather'][0]['description']."'. With a temperature of ".$tempCelcius."&deg;C and a wind speed of ".$windspeed."m/s.";

  

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

    <title>Weather App</title>


    <style type="text/css">
    body{
      background: url("images/wallpaper.jpeg") no-repeat center center fixed;
      background-size: cover;
    }
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
      <h4 class="card-title">Weather App</h5>
      <p class="card-text">Find out what's the weather like in your city!</p>
        <form>
          <div class="form-group">
            <label for="city_text">City</label>
            <input type="text" class="form-control" name="city" id="city_text" placeholder="e.g London, Tokyo">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <div id="clima"><?php 
            if($clima){
              echo '<div class="alert alert-primary" role="alert"> <h4 class="alert-heading"> Weather for <br>'.$ciudadCaps.'</h4>'.$clima.'</div>';         
            }
            else{
              echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
            }
          ?>
        </div>
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