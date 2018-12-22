<?php

/* 	*********************************************
	************ If Statements ******************
	*********************************************
*/

$user = "Andres";

/*if($user == "Andres"){
	echo "<p>Hello Andres</p>";
}

else{
	echo "<p>I dont know you</p>";
}*/

/* Age  Example */

$age = 25;

if($age >= 18 && $user=="Andres"){

	echo "<p>Come in</p>";
}

else{
	echo "<p>Need to be 18 or older";
}

?>
