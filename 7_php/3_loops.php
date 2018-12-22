<?php

/* 	*********************************************
	**************** Loops **********************
	*********************************************
*/

echo "<br>****************************<br>****************************<br> for Loops <br>****************************<br>";

for ($i = 30; $i >= 0; $i = $i - 2){
	echo "<p>".$i."</p>";
}

$family = array ("Andres", "Nelly", "Jorge", "Isabela");

for ($i = 0; $i < sizeof($family); $i++){
	echo "<p>".$family[$i]."</p>";
}


foreach ($family as $key => $value) {
	echo "<p>Array item ".$key." is ".$value." Guerrero</p>";
}




/* While Loop*/

echo "<br>****************************<br>****************************<br> while Loops <br>****************************<br>";

$i=5;
while($i <= 50){
	echo $i."<br>";

	$i = $i + 5;
}

$family = array("Andres", "Nelly", "Jorge", "Isa");
$counter = 0;
while($counter < sizeof($family)){

	echo "<p>".$family[$counter]."</p>";
	$counter++;
}
?>