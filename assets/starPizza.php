<?php
session_start();
require '../function.php';
//check session is admin or have prommision to edit this pizzeria
$error = [];
if(!isset($_POST)){
	$error[] = "Inget psotat";
}
if(!isset($_POST['pizza'])){
	$error[] = "Ingen pizza vald";
}
if(!isset($_SESSION['user'])){
	$error[]= "no user";
}

header('Content-type: text/html; charset=UTF-8');
if(empty($error)){
	$pizza = test_input($_POST['pizza']);
	$conn = connect_to_db();
	$return = [];

	//$result = $conn->query("INSERT INTO pizzorinpizzeria(name, pizzeria, pizzanr, pris, favorits, orders) VALUES (?,?,?,?,?,0,0)");
	if(!($stmt = $conn->prepare("DELETE FROM favorites WHERE pizza = ? AND user = ?"))){
		//var_dump($stmt);
	}
    $stmt->bind_param("ii", $pizza, $_SESSION['user']['nr']);
    //$stmt->execute();
	if ($stmt->execute() === TRUE) {
    //var_dump($stmt);
    if ($stmt->affected_rows > 0){
			$response = ['sucsses' => 'TRUE', 'deleted' => $pizza];
    	}else{
    		if(!($stmt2 = $conn->prepare("INSERT INTO `favorites`(`pizza`, `user`) VALUES (?,?)"))){
				//var_dump($stmt2);
			}
		    $stmt2->bind_param("ii", $pizza, $_SESSION['user']['nr']);
		    //$stmt2->execute();
			if ($stmt2->execute() === TRUE) {
				$response = ['sucsses' => 'TRUE', 'added' => $pizza];
			}
    	}
	}else{
    //var_dump($stmt);
		$response = ['sucsses' => 'FALSE'];
	}
	//$result = $stmt->get_result();

	//$result = $result->fetch_all(MYSQLI_ASSOC);
	echo json_encode($response, JSON_UNESCAPED_UNICODE);

}
else{
	echo json_encode($error, JSON_UNESCAPED_UNICODE);

}
?>