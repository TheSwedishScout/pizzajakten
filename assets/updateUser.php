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
if(isset($_POST['adress'])){ // kollar om lössenordet är inskrivet
	
}
if(!isset($_POST['password2'])){ // kollar om lössenord2 är inskrivet de ska vara lika
	$errors[] = 'Lösenord2 inte satt';
}
if(!isset($_SESSION['user'])){ // kollar om en användare är inloggad
	$errors[] = 'Ingen användare inloggad';
}
if($_POST['password'] !== $_POST['password2']){
	$errors[] = 'Lösenord stämmer inte överäns!';	
}

if(empty($errors)){
	//Uppdatera lösenord
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