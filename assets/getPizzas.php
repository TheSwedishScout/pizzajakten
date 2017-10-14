<?php
include("../function.php");
include('../config.php');



if(isset($_GET['ingredienser'])){
	/**
	* 
	*/
	class pizza
	{	
		public $ingredienser;
		public $namn;
		public $matcningar;
		public $procent;
		
		public function __construct($namn, $ingredienser, $matcningar)
		{
			$this->namn = $namn;
			$this->ingredienser = $ingredienser;
			$this->matcningar = $matcningar;
			$this->procent = ($this->matcningar/count($ingredienser))*100;
		}
	}
	$pizzor = [];
	$conn = connect_to_db();
	$ing = test_input($_GET['ingredienser']);
	$ingred = array_map("trim",explode(",", $ing));
	$ingred = implode("' OR ingrediens LIKE '", $ingred);

	$sql = "SELECT pizza, COUNT(*) as antal FROM ingredienseronpizza WHERE ingrediens LIKE '{$ingred}' GROUP BY pizza HAVING COUNT(pizza) >= 1 ORDER BY COUNT(*) DESC";
	if (isset($_GET['antal'])) {
		$antal = (int)test_input($_GET['antal']);
		$sql .= " LIMIT $antal";
	}
	
	$res = $conn->query($sql);
	//var_dump($res);
	$return =  $res->fetch_all(MYSQLI_ASSOC); // alla pizzor med hur många ingredienser som matchar de sökta;
	//var_dump($return);

	foreach ($return as $pizza) {
		$sql = "SELECT pizzorinpizzeria.*, ingredienseronpizza.ingrediens FROM `pizzorinpizzeria`, ingredienseronpizza WHERE ingredienseronpizza.pizza = pizzorinpizzeria.id AND pizzorinpizzeria.id = ?";
		$stmt = $conn->prepare($sql);
		//var_dump($pizza);
		$stmt->bind_param("i", $pizza['pizza']);
		$stmt->execute();
		$result = $stmt->get_result();
		$ingredienser = [];
		$namn = "";


		while($row = $result->fetch_assoc()) {
			$ingredienser[] = ($row['ingrediens']);
			$namn = $row['name'];
			//echo("hej");
		}
		//var_dump($ingredienser);
		sort($ingredienser);
		$exists = false;
		foreach ($pizzor as $check) {
			if($check->ingredienser == $ingredienser){
				$exists = true;
				break;
			}
		}
		if(!$exists){
			$pizzor[] = new pizza($namn, $ingredienser, $pizza['antal']);
		}
		
	}
	function cmp($a, $b) {
    if ($a->matcningar == $b->matcningar) {
        return ($a->procent < $b->procent) ? 1 : -1;
    }
	    return ($a->matcningar < $b->matcningar) ? 1 : -1;
	}
	usort($pizzor, 'cmp');
	$conn->close();
	//var_dump($pizzor);
	$json = json_encode($pizzor, JSON_UNESCAPED_UNICODE);
	print_r($json);
}

?>
