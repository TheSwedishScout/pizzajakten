<?php
require '../function.php';
//get hämtar från url. I detta fall hämtar vi via en ajax
if(isset($_GET['category'])){
	//header('Content-type: text/html; charset=UTF-8');
	$category = test_input($_GET['category']);
	$conn = connect_to_db();
	$return = [];
	$sql = "SELECT namn, category FROM ingredienser WHERE category = '{$category}' ";
	if (isset($_GET['pizzeria'])) {
		$pizzeria = test_input($_GET['pizzeria']);
		$sql = "SELECT * FROM ingredienser, ingredienseronpizza, pizzorinpizzeria WHERE category = '{$category}' AND ingredienseronpizza.ingrediens = ingredienser.namn AND pizzorinpizzeria.id = ingredienseronpizza.pizza AND pizzorinpizzeria.pizzeria = '{$pizzeria}'"; 
	}
	$result = $conn->query($sql);	
	//$result = $result->fetch_all(MYSQLI_ASSOC);
	$return =  $result->fetch_all(MYSQLI_ASSOC);
	echo json_encode($return, JSON_UNESCAPED_UNICODE);
}
/*// Create a statement
$query = "
    SELECT *
    FROM `mytable`
    WHERE `rows1` = ?
";
$stmt = $this->mysqli->prepare($query);
if (!$stmt)
{
    // handle error
}

// Bind params and execute
$stmt->bind_param("i", $id);
if (!$stmt->execute())
{
    // handle error
}

// Extract result set and loop rows
$result = $stmt->get_result();
while ($data = $result->fetch_assoc())
{
    $statistic[] = $data;
}

// Proof that it's working
echo "<pre>";
var_dump($statistic);
echo "</pre>";
*/
?>