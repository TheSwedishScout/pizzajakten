<?php
	include 'header.php';
	
?>
<main class="left kassa">
	<h2></h2>
		<!-- LISTA på beställning(samma som kundkorg)-->
         
</main>
<main class="right kassa">
	<h2></h2>

		<form class="kassa" action="klar.php" method="POST">
		  <input type="text" name="firstname" placeholder="Förnamn">
		  <input type="text" name="lastname" placeholder="Efternamn">
		  <input type="email" name="mail" placeholder="din.mail@hungrig.nu">
		  	<input type="submit" value="Send">
			<input type="reset" value="Reset">
		</form> 


</main>

<?php
	include 'footer.php';
?>