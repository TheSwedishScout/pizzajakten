<?php
	include 'header.php';
?>
<main class="left">
	<!--<?php
	echo($_SESSION['user_name']);
	var_dump($_SESSION);
	?>-->


<?php
//Cookie code from https://www.w3schools.com/php/func_http_setcookie.asp
if(!isset($_COOKIE[$cookie_name])) {
    echo "Välkommen! Vad kul att du är här!";
} else {
    echo "Välkommen igen! ";
    echo $_COOKIE[$cookie_name];
}
?>
	<ul>
		<li>
			Uppdatera/lägga till adress	
		</li>
		<li>
			
		</li>
		<li>
			
		</li>
		<li>
			
		</li>
		<li>
			
		</li>
		<li>

		</li>
	</ul>

</main>


<main class="right">
		<ul>
			<li>
				orderhistorik
			</li>
		</ul>
	
</main>
<?php
	include 'footer.php';
?>