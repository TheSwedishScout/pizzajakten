<?php
	//Sessionstart måste ligga innan HTml-tecken
	session_start ();
	include 'header.php';

	if (isset($_POST['delete'])) {
		//letar efter _POST pizzaid i arrayn från session och columnen i arrayn "id"
		$hittad = array_search($_POST['pizzaid'], array_column($_SESSION["shopping-cart"], 'id'));

		//ta bort item från _session[cart] från position $hittad
		array_splice($_SESSION['shopping-cart'], $hittad, 1); //1an betyder att den bara bort en pizza åt gången/per klick på ta bort
	}

	
	if(isset($_POST["pizza"])) {

			$item_array = [	'id' => test_input($_POST["pizza"]),
							//'pizza_ingredienser' => test_input($_POST["pizza_ingredienser"]),
							'pizza_quantity' => 1];
			//var_dump($item_array);
			//Hämtar pris, pizza namn osv från databasen
			$conn = connect_to_db(); //connectar till databas
			$SQL = 'SELECT id, name, pizzeria, pris FROM pizzorinpizzeria WHERE id = ?'; //Definerar vad som ska hämtas ifrån databasen
			$stmt = $conn->prepare($SQL); //prepare statment SQL förfrågan till databas
			$stmt->bind_param("i", $item_array['id']); //Lägger värden på där de står frågetecken i texten
			$stmt->execute(); //execute förfrågan till databas
			//var_dump($stmt);
			$res = $stmt->get_result(); //Ger vairablen-namn till de columner som hämtas i databasen så att det är lättare att läsa koden sen,
			$row = $res->fetch_assoc();
			//var_dump($row);
			$item_array = array_merge($item_array, $row);

			/*
			$item_array['id'] = $id;
			$item_array['name'] = $name;
			$item_array['pizzeria'] = $pizzeria;
			$item_array['pris'] = $pris;
			*/
			 //Lägger till id, name, pizzeria och pris i item_array ovan



			
			$_SESSION["shopping-cart"][] = $item_array;
		//}
	}
	
?>
<main class="left varukorg">
<h2 class="order">Din Varukorg</h2>

<?php
	if (!empty($_SESSION["shopping-cart"])){
		$total = 0;
		foreach ($_SESSION["shopping-cart"] as $keys => $values) {
			//var_dump($values)
?>	
<ul>
	<form method="post">
	<!--Denna kod skriver ut i en tabell alla de saker som hämtats från db-->
	<li class="Pizza_namn"><?php echo $values["name"]; ?></li> 
	<!--<li><?php echo $values["pizza_ingredienser"]; ?></li>-->
	<li class="Pizza_pris"><?php echo $values["pris"]; ?> kr</li> 
	<input type="hidden" name="pizzaid" value="<?php echo $values['id'] ?>">
	<li class="Pizza_radera"><input type="submit" name="delete" value="Ta bort"></li>
	</form>

</ul>


<?php
		//$total = $total + ($values["item_quantity"] * $values["item_price"]);

			}
?>

<!--<tr>
	<td colspan="3" align="right">Totalt</td>
	<td align="right">$ <?php echo number_format($total, 2);  ?></td>
</tr>-->

<?php

		} 

?>

</main>
<main class="right varukorg">
	<h2></h2>
        <!-- Knappar för "fortsätt handla som länkar tillbaka till index", logga in fuktion, gästanvändare, ring till pizzerian-knapp-->
</main>

<?php
	include 'footer.php';
?>