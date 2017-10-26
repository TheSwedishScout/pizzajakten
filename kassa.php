<?php
	include 'header.php';


	if (isset($_POST['delete'])) {
		//letar efter _POST pizzaid i arrayn från session och columnen i arrayn "id"
		$hittad = array_search($_POST['pizzaid'], array_column($_SESSION["shopping-cart"], 'id'));

		//ta bort item från _session[cart] från position $hittad
		array_splice($_SESSION['shopping-cart'], $hittad, 1); //1an betyder att den bara bort en pizza åt gången/per klick på ta bort
	}

	


	
?>
<main class="left kassa">
	<h2 class="order">Din beställning</h2>
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
		}
	}	
	?>		
         
</main>
<main class="right kassa">
	<h2 id="kassaH2">Kassa</h2>
	<h3 id="kassaH3">Fyll i dina uppgifter så skickas din beställning till pizzerian</h3>

		<form class="kassa" action="klar.php" method="POST">
		  <input type="text" name="firstname" placeholder="Förnamn" required>
		  <input type="text" name="lastname" placeholder="Efternamn" required>
		  <input type="email" name="mail" placeholder="din.mail@hungrig.nu" required>
		  <input type="text" name="Adress" placeholder="Adress" required>
		  <input type="text" name="Adress" placeholder="Postnummer" required>
		  	<input type="submit" value="Send">
			<input type="reset" value="Reset">
		</form> 

	<p id="kassaP">Du får ett bekärftelsemail via den email du har angivit</p>


</main>

<?php
	include 'footer.php';
?>