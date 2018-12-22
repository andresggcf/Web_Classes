<?php
/*php.ini tiene los archivos de inicialización de php y errores*/

/*variables are $name*/
$name = "Andres";
echo "My name is $name   ";

$str1 = "<p>This is the first part";
$str2 = "of a sentence.</p>";

/*concat strings*/
echo $str1." ".$str2;


/*number variables*/
$myNumber = 25;
$calculation = $myNumber * 31/97+4;

echo "<p>The result is: ".$calculation."</p>";


/*boolean*/
$myBool = true;

echo "<p>This statement is true?".$myBool."</p>";

/*Access variable names within variables*/
$variableName = "name";
/*its like $"name" = $name = Andres */
echo $$variableName."<br><br>";

/* 	*********************************************
	********************Arrays*******************
	*********************************************
*/

$myArray = array ("Andres", "Jorge", "Natalia", "Giann");
print_r($myArray);
echo "<p>".$myArray[2]."</p>";

$otherArray[0] = "pizza";
$otherArray[1] = "burger";
$otherArray[2] = "bread";
$otherArray["myFavoriteFood"] = "ice Cream";

print_r($otherArray);

$thirdArray = array(
		"France" => "french", 
		"USA"=>"english", 
		"Germany" => "Deutsch");

echo "<br><br>";
print_r($thirdArray);
echo sizeof($thirdArray);

/*delete element*/
unset($thirdArray["France"]);
echo "<br><br>";
print_r($thirdArray);

//get contents from other files

include("8_Contents_Other_Scripts.php");

//get contents from other website

//echo file_get_contents("https");

?>