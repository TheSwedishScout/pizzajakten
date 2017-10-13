<?php
require '../function.php';

if(isset($_GET['category'])){
	header('Content-type: text/html; charset=UTF-8');
	$category = test_input($_GET['category']);
	$conn = connect_to_db();
	$return = [];

	$result = $conn->query("SELECT namn, category FROM ingredienser WHERE category = '{$category}' ");
	
	//$result = $result->fetch_all(MYSQLI_ASSOC);
	$return =  $result->fetch_all(MYSQLI_ASSOC);
	echo json_encode($return, JSON_UNESCAPED_UNICODE);
}
?>