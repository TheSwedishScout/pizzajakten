<?php
//använder filen i input.php och pizzasinpizzeria.php  - admin
//Detta är autoifyllen för input. När man börjar skriva så matchar den med db och skriver ut automatiskt

require '../function.php';


if(isset($_GET['term'])){
	header('Content-type: text/html; charset=UTF-8');
	$term = test_input($_GET['term']);
	$conn = connect_to_db();
	$return = [];

	$result = $conn->query("SELECT namn FROM `ingredienser` WHERE `namn` LIKE '{$term}%' LIMIT 5"); //% gör att det ska stämma med det vi har inlagt
	
	//$result = $result->fetch_all(MYSQLI_ASSOC);
	$return[] =  $result->fetch_all(MYSQLI_ASSOC);
	echo json_encode($return, JSON_UNESCAPED_UNICODE);

}
?>