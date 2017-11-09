<?php
	include 'header.php';
	//$conn = connect_to_db();
?>

<!-- Filkarna -->

<ul class="tabs">
	<?php
		$conn = connect_to_db();
		$sql = "SELECT category FROM `ingredienser` GROUP BY category"; //flikarna i kategorier så som krydda, grönsaker osv
		if ($result = $conn->query($sql)) {
			$i = 1;
			while ($row = $result->fetch_assoc()) {
				echo("<li class='shadow tab{$i}' >". $row['category']."</li>"); //lägger på shadow på fliken
				$i++;
		    }
		}
		$conn->close();
	?>
</ul>


<!-- Main sidorna-->
<main class="left">
	<div id="selected"></div>
	<div id="shoises"></div>
</main>
<main class="right">
    <ul class="resultat">
    </ul>
        <h1>Hej!</h1>
    	<p>Börja med att välja dina favorit-ingredienser, så hittar vi den pizza som passar bäst med dina val.</p>
    	<p>Sedan kommer vi att visa var du kan hitta din pizza.</p>
    	<p>När du har hittat din pizzeria så kan du beställa den eller lämna över till nästa som får hitta sin pizza.</p>
</main>

<script src="js/getcategory.js"></script>

<?php
	include 'footer.php';
?>