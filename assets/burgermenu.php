<div id="meny" class="shadow">
		<div class="links">
			
		<a href="varukorg.php">
			<img src="images/cart.png" alt="Varukorg">
			<div class="counter counter1"><?php echo $items_in_cart; ?></div><!-- Echoar ut antal saker som ska ligga i varukorgen-->
			<small>Varukorg</small>
		</a>
		<!--<img src="images/star.png" alt="Favoriter">-->
		<?php 
		//länkar min-sida ikonen till min sida eller login sidan beroende på om man ör inloggad eller ej
		if(isset($_SESSION['user'])){ 
        	echo '<a href="Min-Sida.php"><img src="./images/user.png" alt="min sida"><small>Min sida</small></a>';
		}else{
        	echo '<a href="logIn.php"><img src="./images/user.png" alt="logga in"><small>Logga in</small></a>';
		}

		?>
		</div>
		<nav>
            <h3><a href="./">Hem</a></h3>
            <h3><a href="help.php">Hur fungerar det?</a></h3>
            <h3><a href="hittaPizzeria.php">Hitta din pizzeria</a></h3>
		</nav>
		<!--<input type="search" placeholder="sök" name="">-->
	</div>