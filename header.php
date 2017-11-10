<?php 
 //Header
	session_start();


	if (isset($_SESSION['shopping-cart'])) {
	$items_in_cart = is_array($_SESSION['shopping-cart']) ? count($_SESSION['shopping-cart']) : 0 ; 
	}//Kollar om de finns en array/session med antal saker i (dvs hur mycket som ligger i varukorgen) annars visar countern 0
	else{
		$items_in_cart = 0 ; //visar en nolla när det inte är några produkter i varukorgen
	}
	if(isset($_POST["pizza"]) && !empty($_POST["pizza"])) {//Kollar om variabeln _Post pizza är satt  coh om den inte är tom (att den är definerad), och adderar då +1 i varukorgen 
		$items_in_cart++;
	}
	if(isset($_POST["delete"]) && !empty($_POST["delete"])) {//Kollar om variabeln _Post pizza är satt  coh om den inte är tom (att den är definerad), och adderar då +1 i varukorgen 
		$items_in_cart--; //tar bort från shopping cart när man trycker på delete
	}



	//Cookie code from https://www.w3schools.com/php/func_http_setcookie.asp
	$cookie_name = "more_pizza";
	$cookie_value = "Mer pizza åt folket!";
	setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 = 1 day
	//resten av cookie ligger på min-sida.php
	

	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	

	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<?php
	if(isset($no_balls)){
		?>
		<link rel="stylesheet" type="text/css" href="css/no_balls.css">
	<?php
	}
	?>

	<!-- ****** faviconit.com favicons ****** -->
	<link rel="shortcut icon" href="images/favicon/favicon.ico">
	<link rel="icon" sizes="16x16 32x32 64x64" href="images/favicon/favicon.ico">
	<link rel="icon" type="image/png" sizes="196x196" href="images/favicon/favicon-192.png">
	<link rel="icon" type="image/png" sizes="160x160" href="images/favicon/favicon-160.png">
	<link rel="icon" type="image/png" sizes="96x96" href="images/favicon/favicon-96.png">
	<link rel="icon" type="image/png" sizes="64x64" href="images/favicon/favicon-64.png">
	<link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16.png">
	<link rel="apple-touch-icon" href="images/favicon/favicon-57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/favicon/favicon-114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/favicon/favicon-72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="images/favicon/favicon-144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="images/favicon/favicon-60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="images/favicon/favicon-120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="images/favicon/favicon-76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="images/favicon/favicon-152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="images/favicon/favicon-180.png">
	<meta name="msapplication-TileColor" content="#FFFFFF">
	<meta name="msapplication-TileImage" content="images/favicon/favicon-144.png">
	<meta name="msapplication-config" content="images/favicon/browserconfig.xml">
	<!-- ****** faviconit.com favicons ****** -->

	<script src="https://use.typekit.net/iau7beu.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>

<?php
	require 'function.php';
	$link = explode('/', $_SERVER['REQUEST_URI']);
	$page = end($link);
	$page_nr = 1;
	//Den här koden länkar pilarna på sidorna att gå vidare till nästa sida
//n_page är alla som går till nästkommande sida medan p_page är alla som går till föregånde sida!
	$n_page = '';
	$p_page = '';
	$n_page_hidden = '';
	$p_page_hidden = '';
	$page = explode(".", $page)[0];
	switch ($page) {
		case '':
			$n_page = "pizzerior.php";
			$print_page = "Start";
			$p_page_hidden = 'hidden'; //döljer previous page
			$page_nr = 1;
			break;
		case "index":
			$n_page = "pizzerior.php";
			$print_page = "Start";
			$p_page_hidden = 'hidden'; //döljer previous page
			$page_nr = 1;
			break;
		case "pizzerior":
			$n_page = "varukorg.php";
			$print_page = "Välj pizzeriap";
			$p_page = "index.php";
			$page_nr = 2;
			break;
		case "varukorg":
			$n_page = "kassa.php";
			$print_page = "Varukorg";
			$p_page = "pizzerior.php";
			$page_nr = 3;
			break;
		case "kassa":
			$n_page_hidden = 'hidden'; //döljer next page
			$p_page = "varukorg.php";
			$print_page = "Kassa";
			$page_nr = 4;
			break;
		case "klar":
			$n_page_hidden = 'hidden'; //döljer next page
			$p_page_hidden = 'hidden';
			$print_page = 'klar';
			$page_nr = 5;
			break;
	}

?>
<title><?php if(isset($print_page)){echo($print_page);}else{echo($page);} ?> | Pizza jakten</title>
</head>


<!-- Hamburgermenyn -->
<body>


	<?php

		//Cookie som uppmanar om att vi använder cookies
	if(!isset($_COOKIE['Cookie_bar'])) {
    ?>
    <div class="cookie">
        <p>Vi använder Cookies, bara så du vet!</p><button id="cookie_button">OK!</button>
    </div>
	<?php } ?>



<div class="container">
	<header>
		<img id="burger" class="shadow" src="images/burger.png"/>
		<a href="index.php" class="logga"><img src="images/logotyp.svg" alt="Logga"></a>
		
		<?php //länkar min-sida ikonen till min sida eller login sidan beroende på om man ör inloggad eller ej
		if(isset($_SESSION['user'])){
        	echo '<a href="Min-Sida.php"><img id="user" src="images/user.png" alt="min sida"></a>';
		}else{
        	echo '<a href="logIn.php"><img id="user" src="images/user.png" alt="min sida"></a>';
		}
		?>

        <a href="varukorg.php"><img id="cart" src="images/cart.png"><div class="counter2"><?php echo $items_in_cart; ?></div><!-- Echoar ut antal saker som ska ligga i varukorgen--></a>
	</header>

<!-- Hamburgermenyns innehåll -->	
	<div id="meny" class="shadow">
		<a href="varukorg.php"><img src="images/cart.png" alt="kundvangn"></a>
		<div class="counter1"><?php echo $items_in_cart; ?></div><!-- Echoar ut antal saker som ska ligga i varukorgen-->
		<!--<img src="images/star.png" alt="Favoriter">-->
		<?php 
		//länkar min-sida ikonen till min sida eller login sidan beroende på om man ör inloggad eller ej
		if(isset($_SESSION['user'])){ 
        	echo '<a href="Min-Sida.php"><img src="images/user.png" alt="min sida"></a>';
		}else{
        	echo '<a href="logIn.php"><img src="images/user.png" alt="min sida"></a>';
		}

		?>
		<nav>
            <h3><a href="help.php">Hur fungerar det?</a></h3>
            <h3><a href="hittaPizzeria.php">Hitta din pizzeria</a></h3>
		</nav>
		<!--<input type="search" placeholder="sök" name="">-->
	</div>




<!-- Bilderna i tidslinjen som ska navigera användaren genom köpet-->


<?php
	if(!isset($no_balls)){
	//var_dump($no_balls);
	?>
	<div class="progretion">
		<ul>

		<li>
			
			<a class= "active" href="index.php">

				<img src="images/pizza1.png"/>
				<p>Välj ingredienser</p>

			</a>
		</li>
		
		<li>
			<a class="<?php echo isset($page_nr) && $page_nr >= 2 ? 'active' : null; ?>" href="<?php echo isset($page_nr) && $page_nr == 2 ? 'pizzerior.php' : '#' ?>"> <!-- classen talar om hur bilden ska bete sig när den är aktiv(dvs. den ska vara ifärgad osv)  href talar om huvida man kan klicka på knapparna och komma till sidorna -->
				<img src="images/pizza2.png">
				<p>Hitta Pizzeria</p>
			</a>
		</li>
		<li>
			<a class=" <?php echo (isset($page_nr) && $page_nr > 2) || $items_in_cart > 0  ? 'active' : null; ?>" href="<?php echo (isset($page_nr) && $page_nr > 2) || $items_in_cart > 0 ? 'varukorg.php' : '#' ?>">
				<img src="images/pizza3.png">
				<p>Varukorg</p>
				

			</a>
		</li>
		<li>
			<a class=" <?php echo isset($page_nr) && $page_nr > 3 ? 'active' : null; ?>" href="<?php echo isset($page_nr) && $page_nr > 3 ? 'kassa.php' : '#' ?>">
				<img src="images/pizza4.png">
				<p>Beställ</p>

			</a>
		</li>
		<li>
			<a class=" <?php echo isset($page_nr) && $page_nr > 4 ? 'active' : null; ?>" href="#">
				<img src="images/pizza5.png">
				<p>Klar</p>

			</a>
		</li>
		


		</ul>
	</div>
<?php
	}

?>

<!-- Pilarna på sidorna som ska navigera användaren framåt och bakåt i processen-->
<!--<aside class="right-arrow aside">
	<a class="<?php echo $n_page_hidden; ?>" href="<?php echo $n_page;?>"><img class="shadow" src="images/right-arrow.png"/></a>
</aside>
<aside class="left-arrow aside">
	<a class="<?php echo $p_page_hidden; ?>" href="<?php echo $p_page;?>"><img class="shadow" src="images/left-arrow.png"/></a>
</aside>-->