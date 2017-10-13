<?php
require '../function.php';

//check session is admin or have prommision to edit this pizzeria
$error = [];
if(!isset($_POST)){
	$error[] = "inget namn";

}

	/*
	ingredienser
	pizzanamn
	pizzeria
	nummer
	pris
	favoriter =0
	orders = 0
	*/
if(empty($error)){
	//var_dump($_POST);
	$pizza=[];
	$pizza['ing'] = explode(",",test_input($_POST['ingredienser']));
	$pizza['namn'] = test_input($_POST['namn']);
	$pizza['pizzeria'] = (int)test_input($_POST['pizzeria']);
	$pizza['nummer'] = (int)test_input($_POST['nummer']);
	$pizza['pris'] = (int)test_input($_POST['pris']);

	//var_dump($pizza);

	

	header('Content-type: text/html; charset=UTF-8');
	$conn = connect_to_db();
	$return = [];

	//$result = $conn->query("INSERT INTO pizzorinpizzeria(name, pizzeria, pizzanr, pris, favorits, orders) VALUES (?,?,?,?,?,0,0)");
	if(!($stmt = $conn->prepare("INSERT INTO pizzorinpizzeria(name, pizzeria, pizzanr, pris, favorits, orders) VALUES (?,?,?,?,0,0)"))){
		var_dump($stmt);
	}
    $stmt->bind_param("siii", $pizza['namn'], $pizza['pizzeria'], $pizza['nummer'], $pizza['pris']);
    //$stmt->execute();
	if ($stmt->execute() === TRUE) {
    //var_dump($stmt);
		
		//Add ingrediens
		$added = 0;
		$id = $stmt->insert_id;
		foreach ($pizza['ing'] as $ingredient) {
			if(!($stmt = $conn->prepare("INSERT INTO ingredienseronpizza (ingrediens, pizza) VALUES (?,?)"))){
				var_dump($stmt);
			}
		    $stmt->bind_param("si", $ingredient, $id);
		    //$stmt->execute();
			if ($stmt->execute() === TRUE) {
				$added ++;
			}
			# code...
		}
		$response = ['sucsses' => 'TRUE', 'added' => $added];
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