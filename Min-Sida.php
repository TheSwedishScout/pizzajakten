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
		    echo "Välkommen! Vad kul att du är här!"; //Detta visas första gången man är inne
		} else {
		    echo "Välkommen igen!"; 
		    echo $_COOKIE[$cookie_name];//detta fr.o.m. andra gånge man är inne + 1 dag framåt
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