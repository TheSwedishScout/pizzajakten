<?php
	include 'header.php';
	
?>
<main class="left kassa">
	<h2></h2>
		<!-- LISTA på beställning(samma som kundkorg)-->
         
</main>
<main class="right kassa">
	<h2></h2>

		<form action="klar.php" method="POST">
		  <input type="text" name="firstname" value="">
		  <input type="text" name="lastname" value="">
		  <input type="text" name="mail" value="">
		  	<input type="submit" value="Send">
			<input type="reset" value="Reset">
		</form> 


</main>

<?php
	include 'footer.php';
?>