<?php
	include 'header.php';
	
?>
<main class="left kassa">
	<h2></h2>
		<!-- LISTA på beställning(samma som kundkorg)-->
         
</main>
<main class="right kassa">
	<h2 id="kassaH2">Kassa</h2>
	<h3 id="kassaH3">Fyll i dina uppgifter så skickas din beställning till pizzerian</h3>

		<form class="kassa" action="klar.php" method="POST">
		  <input type="text" name="firstname" placeholder="Förnamn">
		  <input type="text" name="lastname" placeholder="Efternamn">
		  <input type="email" name="mail" placeholder="din.mail@hungrig.nu">
		  	<input type="submit" value="Send">
			<input type="reset" value="Reset">
		</form> 

	<p id="kassaP">Du får ett bekärftelsemail via den email du har angivit</p>


</main>

<?php
	include 'footer.php';
?>