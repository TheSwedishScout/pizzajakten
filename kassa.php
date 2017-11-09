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
	//Totala counte för hur mycket man har i sin order
	if (!empty($_SESSION["shopping-cart"])){ 
		$total = 0; //Count börjar från om med 0
		foreach ($_SESSION["shopping-cart"] as $keys => $values) {
			//var_dump($values)	
	?>
	<ul>
	<form method="post">
        <!--Denna kod skriver ut i en tabell alla de saker som hämtats från db-->
        <li class="Pizza_namn"><?php echo $values["name"]; ?><input type="submit" name="delete" value="Ta bort"></li> 
        <!--<li><?php echo $values["pizza_ingredienser"]; ?></li>-->
        <li class="Pizza_pris"><?php echo $values["pris"]; ?> kr</li> 
        <input type="hidden" name="pizzaid" value="<?php echo $values['id'] ?>">
	</form>
</ul>


	<?php

		}
	}	
        //här gör vi en autoifyllnings funktion för vårt form när man är inloggad. Då kollar vi id och 
        //vi plockar ut de olika raderna i vår tabell och LIMIT säger att vi bara ska ha en av varje. 
        $conn = connect_to_db();
        $sql =  "SELECT user.name, user.email, user.adress, user.post_nr FROM user where id = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        //Här ser vi via session vem som är inloggad och vad den har för id.
		$stmt->bind_param("s", $_SESSION['user']['nr']); 

		$stmt->execute();
        //Här sätter vi resultatet vi får till variabler, som vi sedan kan hänvisa till i formet
		$stmt->bind_result($namn, $email, $adress, $post_nr);
        $stmt->fetch();
        //Eftersom namn kan ha flera förnamn behöver vi hitta vad som är efternamn och dela upp dem så det matchar formet. alltså vi vill ha ett för och ett efternamn.
        // vi säger att enamn blir när $namn trimmas och explodas. 
        $enamn = array_map('trim', explode(' ', $namn));
        //enamn blir den sista delen/variablen av det vi trimmar
        $enamn = end($enamn);
        //Här ersätter vi första delen i enamn och gör det till ett förnamn. allt innan efternamnet då.
        $fnamn = str_replace($enamn,'', $namn);  
    ?>

    <div class="total"><p>TOTALT: <?php echo $items_in_cart; ?></p></div> <!-- Echoar ut antal saker som ska ligga i varukorgen-->     
</main>
<main class="right kassa">
	<h2 class="order">Kassa</h2>
	<h3 id="kassaH3">Fyll i dina uppgifter så skickas din beställning till pizzerian</h3>
		<form class="kassa" action="klar.php" method="POST">
<!--            Vi sätter ett value där vi lägger in variablerna vi har hämtat från tabellen-->
		  <input type="text" value="<?php echo $fnamn;?>" name="firstname" placeholder="Förnamn" required>
		  <input type="text" value="<?php echo $enamn;?>" name="lastname" placeholder="Efternamn" required>
		  <input type="email" value="<?php echo $email;?>" name="mail" placeholder="din.mail@hungrig.nu" required>
		  <input type="text" value="<?php echo $adress;?>" name="Adress" placeholder="Adress" required>
		  <input type="tel" value="<?php echo $post_nr;?>" name="Adress" placeholder="Postnummer" required>
		  	<input type="reset" value="Rensa fält">
		  	<input type="submit" value="Skicka">	
		</form> 
	<p id="kassaP">Du får ett bekärftelsemail via den email du har angivit</p>
</main>

<?php
	include 'footer.php';
?>