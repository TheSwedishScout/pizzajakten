<?php 
 //Header
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>Pizza jakten</title>

	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="./css/main.css">

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

	switch ($page) {
		case '':
			$n_page = "pizzerior.php";
			$p_page_hidden = 'hidden'; //döljer previous page
			$page_nr = 1;
			break;
		case "index.php":
			$n_page = "pizzerior.php";
			$p_page_hidden = 'hidden'; //döljer previous page
			$page_nr = 1;
			break;
		case "pizzerior.php":
			$n_page = "varukorg.php";
			$p_page = "index.php";
			$page_nr = 2;
			break;
		case "varukorg.php":
			$n_page = "kassa.php";
			$p_page = "pizzerior.php";
			$page_nr = 3;
			break;
		case "kassa.php":
			$n_page_hidden = 'hidden'; //döljer next page
			$p_page = "varukorg.php";
			$page_nr = 4;
			break;
		case "klar.php":
			$n_page_hidden = 'hidden'; //döljer next page
			$p_page_hidden = 'hidden';
			$page_nr = 5;
			break;
			

	}

?>

</head>


<!-- Hamburgermenyn -->
<body>
<div class="container">

	<header>
		<img id="burger" class="shadow" src="images/burger.png"/>
		<a href="index.php" class="logga"><img src="images/Logga.png" alt="Logga"></a>
        <a href="logIn.php"><img id="user" src="images/user.png"></a> 
        <a href="varukorg.php"><img id="cart" src="images/cart.png"></a>
	</header>

<!-- Hamburgermenyns innehåll -->	
	<div id="meny" class="shadow">
		<a href="varukorg.php"><img src="images/cart.png" alt="kundvangn"></a>
		<!--<img src="images/star.png" alt="Favoriter">-->
        <a href="logIn.php"><img src="images/user.png" alt="min sida"></a>
		<nav>
            <h3><a href="help.php">Hur fungerar det?</a></h3>
            <h3><a href="hittaPizzeria.php">Hitta din pizzeria</a></h3>
		</nav>
		<input type="search" placeholder="sök" name="">
	</div>




<!-- Bilderna i tidslinjen som ska navigera användaren genom köpet-->
	<div class="progretion">
		<ul>

		<li>
			
			<a class= "active" href="index.php">

				<img src="images/pizza1.png"/>

			</a>
		</li>
		
		<li>
			<a class="<?php echo isset($page_nr) && $page_nr > 1 ? 'active' : null; ?>" href="<?php echo isset($page_nr) && $page_nr == 2 ? 'pizzerior.php' : '#' ?>">
				<img src="images/pizza2.png">

			</a>
		</li>
		<li>
			<a class=" <?php echo isset($page_nr) && $page_nr > 2  ? 'active' : null; ?>" href="<?php echo isset($page_nr) && $page_nr > 2 ? 'varukorg.php' : '#' ?>">
				<img src="images/pizza3.png">

			</a>
		</li>
		<li>
			<a class=" <?php echo isset($page_nr) && $page_nr > 3 ? 'active' : null; ?>" href="<?php echo isset($page_nr) && $page_nr > 3 ? 'kassa.php' : '#' ?>">
				<img src="images/pizza4.png">

			</a>
		</li>
		<li>
			<a class=" <?php echo isset($page_nr) && $page_nr > 4 ? 'active' : null; ?>" href="#">
				<img src="images/pizza5.png">

			</a>
		</li>
		

	</ul>
</div>



<?php


?>

<!-- Pilarna på sidorna som ska navigera användaren framåt och bakåt i processen-->
<!--<aside class="right-arrow aside">
	<a class="<?php echo $n_page_hidden; ?>" href="<?php echo $n_page;?>"><img class="shadow" src="images/right-arrow.png"/></a>
</aside>
<aside class="left-arrow aside">
	<a class="<?php echo $p_page_hidden; ?>" href="<?php echo $p_page;?>"><img class="shadow" src="images/left-arrow.png"/></a>
</aside>-->