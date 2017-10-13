<?php
include("../function.php");
include('../config.php');

$pizzas = [];
class pizza{
	public $id;
	public $name;
	public $ingredientsID;
	public $ingredients = [];
	public $matcningar;
	public $procent;
	public $pizzerior;
	

	public function __construct($id,$name, $ingredients, $matcningar, $pizzerior){
		$this->id = $id;
		$this->name = $name;
		$this->ingredientsID = $ingredients;
		$this->matcningar = $matcningar;
		$this->pizzerior = $pizzerior;
	}
	public function getNames($list){
		$this->ingredients = $list;
		$this->procent = ($this->matcningar/count($this->ingredients))*100;	
	}
	public function clean()
	{
		$this->ingredients = [];
	}
}
$conn = connect_to_db();
if(isset($_GET['ingredienser'])){
	$inIngredienser = test_input($_GET['ingredienser']);
	$inIngredienser = explode(",", $inIngredienser);
	$antal = count($inIngredienser);
	$inIngredienser = implode("' OR ingrediens = '", $inIngredienser);


	//Bör ändrsas så man kan välja på ingredienaser först kan vara så att det blir en ny fil och denna är mer till att välja på mest popolära HAVING COUNT(pizza) >= 1
	$sql = "SELECT pizza, COUNT(*) as antal FROM `ingredienseronpizza` WHERE ingrediens = '$inIngredienser' GROUP BY pizza HAVING COUNT(pizza) >= 1 ORDER BY COUNT(*) DESC";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    $pizzorToGet = [];
	    $matchande_ingredienser = [];
	    while($row = $result->fetch_assoc()) {
	    	$pizzorToGet[] = $row['pizza'];
	    	$matchande_ingredienser[$row['pizza']] = $row['antal'];
	    	//$antalen = $row['antal'];
	    	//var_dump( $antalen);
	    }
	    //echo $antal;
	    $pizzorToGetId = implode(", ", $pizzorToGet);
	    $pizzorToGet = implode(" OR id = ", $pizzorToGet);
	    //var_dump($pizzorToGet);
	    //WHERE `id` = $pizzorToGet
		$sql1 = "SELECT * FROM `pizzorinpizzeria` WHERE `id` = $pizzorToGet ORDER BY FIELD(id, $pizzorToGetId) ASC";
	}else{
		$sql1 = "SELECT * FROM `pizzorinpizzeria`";
	}
}else{
	$sql1 = "SELECT * FROM `pizzorinpizzeria`";
}
	$result1 = $conn->query($sql1);
	$dislpayed_ingredients = [];
	if ($result1->num_rows > 0) {
	    // output data of each row
	    while($row1 = $result1->fetch_assoc()) {
	        //echo "id: " . $row1["id"]. " - Name: " . $row1["namn"];
	        $id = $row1["id"];
	        //loop för ingredienserna
	        $sql2 = "SELECT ingrediens FROM `ingredienseronpizza` WHERE `pizza` = $id ORDER BY `ingredienseronpizza`.`ingrediens` ASC";
			$result2 = $conn->query($sql2);
			$ingredients = [];
			if ($result2->num_rows > 0) {
			    // output data of each row
			    while($row2 = $result2->fetch_assoc()) {
			    		$ingredients[] = $row2["ingrediens"];
			    		$dislpayed_ingredients[] = $row2["ingrediens"];
			    		//var_dump($row2);
			    		//byt nummer mot  deras namn
			    }
			}
	        //get pizzerior tht have that pizza. 
	        $sqlPizzeria= "SELECT pizzerior.* FROM pizzerior, pizzorinpizzeria AS pi WHERE pi.id = $id AND pi.pizzeria = pizzerior.id";
	        $resultPizzeria = $conn->query($sqlPizzeria);
	        $pizzerior = [];
	        //var_dump($row1);
	        if ($resultPizzeria->num_rows > 0){
	        	while ($rowPizzeria = $resultPizzeria->fetch_assoc()) {
	        		$pizzerior[] = $rowPizzeria["namn"];
	        	}
	        }
			if(isset($matchande_ingredienser)){
	        	$pizzas[]= new pizza($id, $row1["name"], $ingredients, $matchande_ingredienser[$id], $pizzerior);
	        }else{
	        	$pizzas[]= new pizza($id, $row1["name"], $ingredients, NULL, $pizzerior);
	        }
	    }
	} else {
	    echo "0 results";
	}
	$dislpayed_ingredients = array_unique($dislpayed_ingredients);
	$where = implode("' OR `namn` = '", $dislpayed_ingredients);
	$associativeArray = [];

	$sql3 = "SELECT * FROM `ingredienser` WHERE `namn` = '$where'  ORDER BY `namn` ASC";
	$result3 = $conn->query($sql3);
	if ($result3->num_rows > 0) {
	    // output data of each row
	    while($row3 = $result3->fetch_assoc()) {
	    	//echo $row3['id'] ." = ".$row3['namn']."<br>";
	    	$associativeArray[$row3['namn']] = $row3['namn'];
	    }
	}

	foreach($pizzas as $key=>$value){
	  echo $value->getNames($associativeArray);
	}

//var_dump($pizzas);
//var_dump($matchande_ingredienser);
	//var_dump($pizzas);
	foreach ($pizzas as $pizza) {
		$pizza->clean();
	}
	
	//$pizzas = array_map("clean" $pizzas);
usort($pizzas, 'cmp');
$json = json_encode($pizzas, JSON_UNESCAPED_UNICODE);


$conn->close();
print_r($json);

function cmp($a, $b) {
    if ($a->matcningar == $b->matcningar) {
        return ($a->procent < $b->procent) ? 1 : -1;
    }
    return ($a->matcningar < $b->matcningar) ? 1 : -1;
}

?>
