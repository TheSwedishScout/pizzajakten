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
	if (isset($_POST['ingredienser'])) {
		$ingredienser = test_input($_POST['ingredienser']);
		var_dump($ingredienser);
	}
	$conn = connect_to_db();
	$sql = "UPDATE pizzorinpizzeria SET name = ?, pris = ? WHERE id = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("sii",$namn, $pris, $id);
	$stmt->execute();

	if ($stmt->errno) {
	  echo "FAILURE!!! " . $stmt->error;
	}
	else echo "Updated {$stmt->affected_rows} rows";

	$json = json_encode($pizzor, JSON_UNESCAPED_UNICODE);
	print_r($json);
	$stmt->close();
}

?>