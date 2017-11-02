<?php
if(isset($_POST['pizza'])){
	require '../../function.php';
	$id= (int)test_input($_POST['pizza']);
	if (isset($_POST['namn'])) {
		$namn = test_input($_POST['namn']);
	}
	if (isset($_POST['pris'])) {
		$pris = (int)test_input($_POST['pris']);
	}

	$conn = connect_to_db();
	$sql = "UPDATE pizzorinpizzeria SET name = ?, pris = ? WHERE id = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("sii",$namn, $pris, $id);
	$stmt->execute();
	$response = [];
	if ($stmt->errno) {
	  $response['error'] = $stmt->error;
	}
	$response['sucsess'] = $stmt->affected_rows;

	$result = $stmt->get_result();
	$stmt->close();

	//var_dump($stmt->get_result());

	/*---------------------------------------Update ingredients---------------------------------------*/

	//ta bort alla ingredienser och lägg till de i listan på nytt.
	if (isset($_POST['ingredienser'])) {
		$ingredienser = explode(',',($_POST['ingredienser']));
	
	//tar bort ingredienser från pizzan
		$sql2 = "DELETE FROM ingredienseronpizza WHERE pizza = ?";
		$stmt = $conn->prepare($sql2);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$stmt->close();
		$sql3 = "INSERT INTO ingredienseronpizza(ingrediens, pizza) VALUES (?,?)";
		//var_dump($ingredienser);
		foreach ($ingredienser as $ingrediens) {
			$stmt = $conn->prepare($sql3);
			$stmt->bind_param("si", $ingrediens, $id);
			$stmt->execute();
			$stmt->close();
		}
	}

	$json = json_encode($response, JSON_UNESCAPED_UNICODE);
	print_r($json);
}

?>