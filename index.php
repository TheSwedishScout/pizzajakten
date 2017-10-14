<?php
	include 'header.php';
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

    
    <ul class="resultat">
        <!--<li class="resultatInner">
        	<img src="images/pizza6.png">
        	<h2>Pizzanamn</h2>
        	<h3>Lök, tomat, paprika, bearnaisesås</h3>
        	<h4>saknar: Kebab, creme fraiche</h4>
        </li>
         <li class="resultatInner"><h2><img src="images/pizza6.png"> Pizzanamn</h2><h3>Lök, tomat, paprika, bearnaisesås</h3></li>
         <li class="resultatInner"><h2><img src="images/pizza6.png"> Pizzanamn</h2><h3>Lök, tomat, paprika, skinks, bearnaisesås</h3></li>
         <li class="resultatInner"><h2><img src="images/pizza6.png"> Pizzanamn</h2><h3>Lök, tomat, paprika, skinks, bearnaisesås</h3></li>
         <li class="resultatInner"><h2><img src="images/pizza6.png"> Pizzanamn</h2><h3>Lök, tomat, paprika, skinks, bearnaisesås</h3></li>
         <li class="resultatInner"><h2><img src="images/pizza6.png"> Pizzanamn</h2><h3>Lök, tomat, paprika, skinks, bearnaisesås</h3></li>
         <li class="resultatInner"><h2><img src="images/pizza6.png"> Pizzanamn</h2><h3>Lök, tomat, paprika, skinks, bearnaisesås</h3></li>
         <li class="resultatInner"><h2><img src="images/pizza6.png"> Pizzanamn</h2><h3>Lök, tomat, paprika, skinks, bearnaisesås</h3></li>
     -->
    </ul>
</main>


<script src="js/getcategory.js"></script>




<?php
	include 'footer.php';
?>