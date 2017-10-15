<?php
	include 'header.php';

	session_start ();
	if(isset($_POST["add-to-cart"])) {
		
		if (isset($_SESSION["shopping-cart"])) {
			$item_array_id = $array_column($_SESSION["shopping-cart"], "item_id");
			if(!in_array($_GET["id"], $item_array_id)) {

				$count = count($_SESSION["shopping-cart"]);
				$item_array = array (
					'item_id' => $_GET["pizzaid"],
					'item_name' => $_POST["hidden_name"],
					'item_price' => $_POST["hidden_price"],
					'item_quantity' => $_POST["quantity"]
					);
				$_SESSION["shopping-cart"][$count] = $item_array;
			}

			else {

				echo '<script>("Pizza redan tillagd!")</script>';
				echo '<script>window.location="index.php"</script>';

			}

		}
		else {
			$item_array = array (
					'item_id' => $_GET["pizzaid"],
					'item_name' => $_POST["hidden_name"],
					'item_price' => $_POST["hidden_price"],
					'item_quantity' => $_POST["quantity"]


				);
			
			$_SESSION["shopping-cart"][0] = $item_array;
		}
	}
	
?>
<main class="left varukorg">


<?php

	$query = "SELECT * FROM pizzorinpizzeria ORDER BY id";
	$result = mysqli_query($connect , $query);

	if(mysqli_num_rows($result) > 0 ){
			while($row = mysqli_fetch_array($result)){
?>
				<div class="col-md-4">
					<form method="POST" action="kassa.php <?php echo $row["id"]; ?>">
						<h3 class="text-info"> <?php echo $row["pizzaid"]?></h3>
						<h3 class="text-danger">$ <?php echo $row["pris"]?></h3>
						<input type="text" name="quantity" class="form-control" value="1"/>
						<input type="hidden" name="hidden_name" value=" <?php echo $row["pizzaid"]; ?>" />
						<input type="hidden" name="hidden_price" value=" <?php echo $row["pris"]; ?>" />
						<input type="submit" name="add-to-cart" class="btn btn-success" value="add to cart" />
					</form>
				</div>
<?php
			}
		} 

?>

<?php
	if (!empty($_SESSION["shopping-cart"])){
		$total = 0;
		foreach ($_SESSION["shopping-cart"] as $keys => $values) {

?>	
<tr>
	<td><?php echo $values["item_name"]; ?></td>
	<td><?php echo $values["item_quantity"]; ?></td>
	<td>$ <?php echo $values["item_price"]; ?></td>
	<td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
	<td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">RADERA</span></a></td>
</tr>
<?php
		$total = $total + ($values["item_quantity"] * $values["item_price"]]);

			}
?>

<tr>
	<td colspan="3" align="right">Totalt</td>
	<td align="right">$ <?php echo number_format($total, 2);  ?></td>
</tr>

<?php

		} 

?>

	<h2></h2>
        <!--Lista på beställning (samma som kassa)-->
</main>
<main class="right varukorg">
	<h2></h2>
        <!-- Knappar för "fortsätt handla som länkar tillbaka till index", logga in fuktion, gästanvändare, ring till pizzerian-knapp-->
</main>

<?php
	include 'footer.php';
?>