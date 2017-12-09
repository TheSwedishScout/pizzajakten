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
	$pizzor = [];     //Skapar en tom array av pizzor
	$conn = connect_to_db();
	$ing = test_input($_GET['ingredienser']); //hämtar ingredienser från url'en om ingredienser är definierat
    
    //explode Returns an array of strings. "split a string by string"
    //trim — Strip whitespace (or other characters) from the beginning and end of a string
	$ingred = array_map("trim",explode(",", $ing)); //array_map är en funktion som tar alla ingrediener 
	$ingred = implode("' OR ingrediens LIKE '", $ingred); //Returnerar en sträng av arrayen 
	//$ingred = implode("', '", $ingred); //Returnerar en sträng av arrayen 

    //räknar hur många av någonting det finns 
	$sql = "SELECT pizza, COUNT(*) as antal FROM ingredienseronpizza WHERE ingrediens LIKE '{$ingred}' GROUP BY pizza HAVING COUNT(pizza) >= 1 ORDER BY COUNT(*) DESC"; 
	//$sql = "SELECT pizza, COUNT(*) as antal FROM ingredienseronpizza WHERE WHERE ingrediens IN('{$ingred}') GROUP BY pizza HAVING COUNT(pizza) >= 1 ORDER BY COUNT(*) DESC"; 
    //Om antal är angett i url'en så limiteras sql till att köras så många gånger som antal är
    if (isset($_GET['antal'])) {
		$antal = (int)test_input($_GET['antal']);
		$sql .= " LIMIT $antal";
	}
	
	$res = $conn->query($sql);
	//var_dump($res);
	$return =  $res->fetch_all(MYSQLI_ASSOC); //alla pizzor med hur många ingredienser som matchar de sökta;
	//var_dump($return);

	foreach ($return as $pizza) { //för varje pizza i pizzaresultatet körs denna loop
        //VÄLJ alla attribut från tabellerna pizzorinpizzeria 
        //och ingrediedienser från tabellen ingredienseronpizza
        //
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
		}

		//sorterar ingredienser i bokstavsordning
        sort($ingredienser);
        //en check-variabel. säkerhet typ. Man checkar pizorns ingredienser. Om de finns så breakar det och det fortsätter inte till if.
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
    //jämför ingredienser med pizzor i procent. Den med högst match visas först.
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
