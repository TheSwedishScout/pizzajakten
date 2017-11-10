
<?php
require '../../function.php';

//check session is admin or have prommision to edit this pizzeria
$error = [];
if(!isset($_POST)){
	$error[] = "Inget psotat";

}
if(!isset($_POST['kat'])){
	$error[] = "Ingen kategori";

}
if(!isset($_POST['namn'])){
	$error[] = "Inget namn";

}

	/*
		namn
		kat
	*/
if(empty($error)){
	$kat = test_input($_POST['kat']);
	$namn = test_input($_POST['namn']);
	$vegan = 0;
	if(isset($_POST['vegan'])){
		$vegan = 1; 
	}

	header('Content-type: text/html; charset=UTF-8');
	$conn = connect_to_db();
	$return = [];

	//$result = $conn->query("INSERT INTO pizzorinpizzeria(name, pizzeria, pizzanr, pris, favorits, orders) VALUES (?,?,?,?,?,0,0)");
	if(!($stmt = $conn->prepare("INSERT INTO ingredienser(namn, category, vegan) VALUES (?,?,?)"))){
		var_dump($stmt);
	}
    $stmt->bind_param("ssi", $namn, $kat, $vegan);
    //$stmt->execute();
	if ($stmt->execute() === TRUE) {
    //var_dump($stmt);
		$response = ['sucsses' => 'TRUE', 'added' => $namn];
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