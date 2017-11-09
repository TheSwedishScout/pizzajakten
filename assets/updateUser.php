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
	if(isset($_POST['adress'])){ // kollar om lössenordet är inskrivet
		$adress = test_input($_POST['adress']);
	}
	if(isset($_POST['post_nr'])){ // kollar om lössenordet är inskrivet
		$post_nr = test_input($_POST['post_nr']);
	}
	if(isset($_POST['ort'])){ // kollar om lössenordet är inskrivet
		$ort = test_input($_POST['ort']);
	}
	if(isset($_POST['email'])){ // kollar om lössenordet är inskrivet
		$email = test_input($_POST['email']);
	}
	$password = test_input($_POST['password']);
	$sql = 'UPDATE user SET password=? WHERE id = ?';
	$conn = connect_to_db();
	$options = [
	'cost' => 10
	];
	$password_hashed = password_hash($password, PASSWORD_BCRYPT, $options);
	unset($password);
	$stmt = $conn->prepare($sql);
	$id = 2;
	$stmt->bind_param("si", $password_hashed, $id); // $_SESSION['user']['nr']
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