<?php
	require 'header.php';
?>
        
<main class="left">
	<?php
	$conn = connect_to_db();
	$sql = "SELECT `id`, `namn` FROM `pizzerior`";
	$result = $conn->query($sql);
	$rows = $result->fetch_all(MYSQLI_ASSOC);
		
	?>
	<h2>Ny pizza</h2>
	<form id="selectPizzeria">
		Välj pizzeria
		<select name="pizzeria">
			<?php
			if (isset($_GET['pizzeria']) && !empty($_GET['pizzeria'])) {
				$pizzeria = (int)test_input($_GET['pizzeria']);
			}else{
				$pizzeria = NULL;
			}
				foreach ($rows as $row) {
					$select = "";
					if ($pizzeria == $row['id']) {
						$select = "selected";
					}
					echo "<option {$select} value='".$row['id']."'>{$row['namn']}</option>";
				}
			?>
		</select>
		<input type="submit" name="" value="Välj">
	</form>
	<?php
	//js för att hämta och skriva ut pizzorna
	            
	?>
	<ol id="pizzaz-in-pizzeria">
		<li class="pizza">
			<h3>1) Marhareta</h3>
			<p>85kr</p>
			<ul>
				<li>
					ingrediens
				</li>
			</ul>
		</li>
	</ol>
</main>
<main class="right">
	
</main>
<script type="text/javascript" src="js/pizzasinPizzeria.js"></script>
<?php
	include 'footer.php';
?>