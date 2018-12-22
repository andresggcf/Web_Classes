<?php

//print_r($_POST);

if($_POST){
	$usernames = array("andres", "isabela", "carlos", "dora");
	$isKnown = false;
 
	foreach ($usernames as $value) {
		# code...
		if($value==$_POST['name']){
			$isKnown = true;
		}
	}

	if($isKnown){
		echo "hi there ".$_POST['name']."!";
	}
	else{
		echo "i dont know you";
	}

}


?>

<p>Please enter your name</p>
<form method="post">
	<input name="name" type="text">
	<input type="submit" value="Submit">

</form>