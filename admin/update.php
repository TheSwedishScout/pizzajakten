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
	<form method="GET">
		pizzeria select get from db
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
		<input type="submit" name="">
	</form>
	<?php
	if (isset($_GET['pizzeria']) && !empty($_GET['pizzeria'])) {
		$pizzeria = (int)test_input($_GET['pizzeria']);
		$sql = "SELECT * FROM `pizzorinpizzeria` WHERE `pizzeria` = ? ORDER BY `pizzeria` DESC";
		$stmt = $conn->prepare($sql);
	    $stmt->bind_param("i", $pizzeria);
	    $stmt->execute();
	    $result = $stmt->get_result();
        //var_dump($result);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            	var_dump($row); //Enskild pizza in pizzeria
            	$sql = "SELECT ingrediens FROM ingredienseronpizza where pizza = ?";
				$stmt = $conn->prepare($sql);
			    $stmt->bind_param("i", $row['id']);
			    $stmt->execute();
			    $resultingred = $stmt->get_result();
			    while($rowingred = $resultingred->fetch_assoc()) {
			    	var_dump($rowingred);
			    }
            }
        }
	
		?>
		<form method="GET">
			
		</form>
		<?php
	}
	?>
</main>
<main class="right">
	
</main>
<?php
	include 'footer.php';
?>