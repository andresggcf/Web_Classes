<?php

$error = "";
$successMessage = "";
//php form validation
if ($_POST){

	if(!$_POST['email_text']){
		$error.= "An email is required to continue<br>";
	}

	if(!$_POST['subject_text']){
		$error.= "A subject is required to continue<br>";
	}

	if($_POST['text_area'] == ""){
		$error.= "A message is required to continue<br>";
	}

	//validate email address

	if ($_POST['email_text'] && filter_var($_POST['email_text'], FILTER_VALIDATE_EMAIL)===false) {
  		$error.="Email is not a valid address";
	}

	if($error != ""){
		$error = '<div class="alert alert-danger" role="alert"><p><strong>There were errors in your form:</strong></p>'.$error.'</div>';
	}

	else{
		$emailTo = "andresggcf@gmail.com";
		$subject = $_POST['subject_text'];
		$content = $_POST['text_area'];
		$headers = "From".$_POST['email_text'];

		if(mail($emailTo, $subject, $content, $headers)){
			$successMessage = '<div class="alert alert-sucess" role="alert"><p><strong>Thank you<, we will get in touch with you soon!/strong></p></div>';
		}
		else{
			$error = '<div class="alert alert-danger" role="alert"><p>Message was not sent, try again</p></div>';
		}
		print_r($subject);
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

    <title>Email Form</title>
  </head>
  <body>

  	<div class="container">
    	<h1>Get in touch</h1>
		<br>
		<div id="error"> 
			<!--Llamamos php error -->
			<? echo $error.$successMessage; ?>
				
		</div>
		<form method="post">
		  <div class="form-group">
		    <label for="email_text">Email address</label>
		    <input type="email" class="form-control" id="email_text" placeholder="name@example.com" name="email_text">
		    <small  class="text-muted">We'll never share your password with anyone!</small>
		  </div>
		  <div class="form-group">
		    <label for="subject_text">Subject</label>
		    <input type="text" class="form-control" id="subject_text" name="subject_text">
		  </div>
		  <div class="form-group">
		    <label for="text_area">Message</label>
		    <textarea class="form-control" id="text_area" rows="3" name="text_area"></textarea>
		  </div>
		  <button type="submit" id="submit_b" class="btn btn-primary mb-2">Send Mail</button>
		</form>

	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <script type="text/javascript">
		
		//javascript form validation

    	$("form").submit(function (e){



    		var error = "";

    		if ($("#email_text").val()==""){
    			error = error + "The 'Email' field is required<br>";
    		}

    		if ($("#subject_text").val() == ""){
    			error = error + "The 'Subject' field is required<br>";
    		}

    		if ($("#text_area").val() == ""){
    			error = error + "The 'Message' field is required<br>";
    		}

    		if (error != ""){
    			$("#error").html('<div class="alert alert-warning" role="alert"><p><strong>There were errors in your form:</strong></p>'+ error+'</div>');
    			return false;
    		}

    		else{
    			$("#error").html('<div id="error"></div>');
    			//unbind does submit without revalidating
    			//$("form").unbind("submit").submit();
    			return true;

    		}
    	});

    </script>
  </body>
</html>