<?php
session_start();
include '../function.php';
$errors = [];
$sucsses = false;
//Kolla igenom säkerhetsaker
/*
$_POST['adress']
$_POST['post_nr']
$_POST['ort']
$_POST['email']
*/


if(!isset($_SESSION['user'])){ // kollar om en användare är inloggad
	$errors[] = 'Ingen användare inloggad';
}

if(empty($errors)){
	//Uppdatera lösenord
	$updates = "";
	if(isset($_POST['adress'])){ // kollar om lössenordet är inskrivet
		$adress = test_input($_POST['adress']);
		$updates .= "adress='{$adress}',";
	}
	if(isset($_POST['post_nr'])){ // kollar om lössenordet är inskrivet
		$post_nr = test_input($_POST['post_nr']);
		$updates .= "post_nr='{$post_nr}',";
	}
	if(isset($_POST['ort'])){ // kollar om lössenordet är inskrivet
		$ort = test_input($_POST['ort']);
		$updates .= "ort='{$ort}',";
	}
	if(isset($_POST['email'])){ // kollar om lössenordet är inskrivet
		$email = test_input($_POST['email']);
		$updates .= "email='{$email}',";
	}
	$updates .= "*";
	$updates = str_replace(",*", "", $updates);

	$sql = "UPDATE user SET {$updates} WHERE id = ?";
	$conn = connect_to_db();
	$stmt = $conn->prepare($sql);
	//$id = 2;
	$stmt->bind_param("i", $_SESSION['user']['nr']);
	$stmt->execute();
	if($stmt->affected_rows === 1){
		$sucsses = True;
	}
	$stmt->close();
	$conn->close();
}

header("Location: ../Min-Sida.php"); // eller JSON
exit();
?>