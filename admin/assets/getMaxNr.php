<?php
include '../../function.php';
if (isset($_GET['pizzeria']) && !empty($_GET['pizzeria'])) {
	$conn = connect_to_db();
	$pizzeria = (int)test_input($_GET['pizzeria']);
	$sql = "SELECT  MAX(pizzanr) AS max FROM pizzorinpizzeria WHERE pizzeria = ? LIMIT 1";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $pizzeria);
	$stmt->execute();
	$stmt->bind_result($maxnr);
	$stmt->fetch();
	$stmt->close();
	$conn->close();
	if($maxnr === null){
		$maxnr = 0;
	}
	echo json_encode($maxnr, JSON_UNESCAPED_UNICODE);
}
?>