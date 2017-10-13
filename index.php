<?php
	include 'header.php';
	if (isset($_GET['t'])){
		$tab = test_input($_GET['t']);
	}
	//$conn = connect_to_db();
	$conn = connect_to_db();
				//$sql = "SELECT id, first_name, last_name FROM author";
				/*$sql = "SELECT category FROM `ingredienser` GROUP BY category";
				if ($result = $conn->query($sql)) {
					while ($row = $result->fetch_assoc()) {
						echo("<option value='".$row['id']."' >". $row['first_name']." ".$row['last_name']."</option>");
				    }
				}
				$conn->close();*/
?>

<!-- Filkarna -->
<div class="tabs">
	<a class="shadow <?php echo !isset($tab) || $tab == 'GRÖNSAKER' ? 'active' : null; ?>" href="?t=GRÖNSAKER">grönsak</a>
	<a class="shadow <?php echo isset($tab) && $tab == 'TOPPING' ? 'active' : null; ?>" href="?t=TOPPING">TOPPING</a>
	<a class="shadow <?php echo isset($tab) && $tab == 'KÖTT' ? 'active' : null; ?>" href="?t=KÖTT">KÖTT</a>
	<a class="shadow <?php echo isset($tab) && $tab == 'OSTER' ? 'active' : null; ?>" href="?t=OSTER">OSTER</a>
	<a class="shadow <?php echo isset($tab) && $tab == 'SÅSER' ? 'active' : null; ?>" href="?t=SÅSER">SÅSER</a>
</div>

<!-- Main sidorna-->
<main class="left">
	<h2>Sid  specifikt</h2>
</main>
<main class="right">
	<h2>Sid  specifikt</h2>
</main>
<script src="js/getcategory.js"></script>
<?php
	include 'footer.php';
?>