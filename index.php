<?php
	include 'header.php';
	if (isset($_GET['t'])){
		$tab = test_input($_GET['t']);
	}
	//$conn = connect_to_db();
?>

<!-- Filkarna -->
<ul class="tabs">
	<?php
		$conn = connect_to_db();
		//$sql = "SELECT id, first_name, last_name FROM author";
		$sql = "SELECT category FROM `ingredienser` GROUP BY category";
		if ($result = $conn->query($sql)) {
			while ($row = $result->fetch_assoc()) {
				echo("<li class='shadow' >". $row['category']."</li>");
		    }
		}
		$conn->close();

	?>
</ul>

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