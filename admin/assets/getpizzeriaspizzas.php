<?php
include '../../function.php';
if (isset($_GET['pizzeria']) && !empty($_GET['pizzeria'])) {
	/**
	* Pizza
	*/
	$pizzor = []; 
	$conn = connect_to_db();
	$pizzeria = (int)test_input($_GET['pizzeria']);
	$sql = "SELECT * FROM `pizzorinpizzeria` WHERE `pizzeria` = ? ORDER BY `pizzanr` ASC";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $pizzeria);
	$stmt->execute();
	$result = $stmt->get_result();
	//var_dump($result);
	if ($result->num_rows > 0) {
		
		//loppar var pizza
	    while($row = $result->fetch_assoc()) {
	    	$row['ingredienser'] = [];
	    	$sql = "SELECT ingrediens FROM ingredienseronpizza where pizza = ?";
			$stmt = $conn->prepare($sql);
		    $stmt->bind_param("i", $row['id']);
		    $stmt->execute();
		    $resultingred = $stmt->get_result();
		    //loppar ingredienser i en pizza
		    while($rowingred = $resultingred->fetch_assoc()) {
		    	$row['ingredienser'][]= $rowingred['ingrediens'];
		    }
	    	$pizzor[] =$row;
	    }
	}
	echo json_encode($pizzor, JSON_UNESCAPED_UNICODE);
}
?>