<?php
	include 'header.php';
	//$conn = connect_to_db();
?>

<!-- Filkarna -->

<ul class="tabs">
	<?php
		$conn = connect_to_db();
		$sql = "SELECT category FROM `ingredienser` GROUP BY category";
		if ($result = $conn->query($sql)) {
			$i = 1;
			while ($row = $result->fetch_assoc()) {
				echo("<li class='shadow tab{$i}' >". $row['category']."</li>");
				$i++;
		    }
		}
		$conn->close();
	?>
</ul>


<!-- Main sidorna-->
<main class="left">
</main>
<main class="right">
    <ul class="resultat">
    </ul>
</main>

<script src="js/getcategory.js"></script>

<?php
	include 'footer.php';
?>