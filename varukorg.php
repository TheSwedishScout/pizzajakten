<?php
	include 'header.php';
	if (isset($_POST['delete'])) {
		//letar efter _POST pizzaid i arrayn från session och columnen i arrayn "id"
		$hittad = array_search($_POST['pizzaid'], array_column($_SESSION["shopping-cart"], 'id'));

		//ta bort item från _session[cart] från position $hittad
		array_splice($_SESSION['shopping-cart'], $hittad, 1); //1an betyder att den bara bort en pizza åt gången/per klick på ta bort
	}

	
	if(isset($_POST["pizza"])) {

			$item_array = [	'id' => test_input($_POST["pizza"]),
							//'pizza_ingredienser' => test_input($_POST["pizza_ingredienser"]),
							'pizza_quantity' => 1];
			//var_dump($item_array);
			
			//$item_array = array_merge($item_array, $row);
			//Lägger till id, name, pizzeria och pris i item_array ovan



			//Lägger till din order i shoping carten
			$_SESSION["shopping-cart"][] = $item_array;
			
		//}
	}
	
?>
<main class="left varukorg">
<h2 class="order">Din Varukorg</h2>

<?php
	//
	$pizzerior = [];
	//Totala counte för hur mycket man har i sin order
	if (!empty($_SESSION["shopping-cart"])){ 
		//var_dump($_SESSION["shopping-cart"]);
		$total = 0; //Count börjar från om med 0
		foreach ($_SESSION["shopping-cart"] as $pizzaid) {
			//Hämtar pris, pizza namn osv från databasen
			
			$pizzerior[] = printPizza($pizzaid['id']);
		}
		$pizzerior = array_unique($pizzerior);

		?>
	
		<script type="text/javascript">
			var pizzerior = <?= count($pizzerior); ?> 
		</script>


		<p>Pizzerior: </p>
		<ul>
		<?php
		foreach ($pizzerior as $pizzeria) {
			echo("<li><a href='pizzeria?pizzeria={$pizzeria}'>".$pizzeria."</a></li>");
		}
	}
?>
		</ul>

<div class="total"><p>TOTALT: <?php echo $items_in_cart; ?></p></div> <!-- Echoar ut antal saker som ska ligga i varukorgen--> 
</main>
<main class="right varukorg">
	<ul class="continue">
        <li><h2>ÄR DU BELÅTEN ELLER VILL DU HA MER?</h2></li>
        <?php
        foreach ($pizzerior as $pizzeria) {
        	?>
        	<li><a href="pizzeria?pizzeria=<?= $pizzeria; ?>"><button><p>Hitta fler pizzor hos <?= $pizzeria; ?></p></button></a></li>
        	<?php
        }
        ?>
        <li><a href="/"><button><p>Forsätt handla</p></button></a></li>
        <?php if (!empty($_SESSION["shopping-cart"])){ ?>
        <li ><a href="kassa"><button id="tillKassa"><p>Gå till kassan</p></button></a></li>
        <?php 
    	}else{
    		?><li><a href="#"><button><p>Gå till kassan</p></button></a></li><?php
    	}
        if(!isset($_SESSION['user'])){
	        ?>
	        <li><a href="logIn"><button><p>Logga in</p></button></a></li>
	        <?php
        } 
         ?>
    </ul>
</main>

<?php
 	$_POST = array(); 
	include 'footer.php';
?>