<?php

/*si _GET tiene contenido o no, es un positivo, entero y numerico*/
if (is_numeric($_GET['number']) && ($_GET['number'] > 0) && ($_GET['number'] == round($_GET['number'],0))){
	$is_prime = true;
	for ($i=2; $i < $_GET['number']; $i++)
		if($_GET['number'] % $i == 0){
			//number is not prime
			$is_prime = false;
		}
	if ($is_prime){
		echo "<p>".$_GET['number']." is a prime number";
	}
	else{
		echo "<p>".$_GET['number']." is not a prime number";
	}
}

else if ($_GET){
	//user submitted something that is not a positive integer.
	echo "<p>Please enter a whole positive number</p>";
}


?>

<p>Please enter a number</p>
<form>
	<input name="number" type="text">

	<input type="submit" value="Go!">
</form>