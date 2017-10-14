<?php 
 //Header
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>Pizza jakten</title>

	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="./css/main.css">

	<script src="https://use.typekit.net/iau7beu.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>

<?php
	require 'function.php';
	$link = explode('/', $_SERVER['REQUEST_URI']);
	$page = end($link);
?>

</head>



<!-- Hamburgermenyn -->
<body>
<div class="container">

	<header>
		<img id="burger" class="shadow" src="images/burger.png"/>
		<img src="images/Logga.png" alt="Logga">
	</header>

<!-- Hamburgermenyns innehåll -->	
	<div id="meny" class="shadow">
		<img src="" alt="kundvangn">
		<img src="" alt="Favoriter">
		<img src="" alt="min sida">
		<nav>
			<h3>Hur fungerar det?</h3>
			<h3>Hitta din pizzeria</h3>
			<h3>Pizzerior</h3>
		</nav>
		<input type="search" placeholder="sök" name="">
	</div>




<!-- Bilderna i tidslinjen som ska navigera användaren genom köpet-->
	<ul class="progretion">
				<a class= "active" href="index.php"><img src="images/pizza1.png"></a>
				<a class="<?php echo isset($page) && $page == 'pizzerior.php' || $page == 'varukorg.php' || $page == 'kassa.php' || $page == 'klar.php' ? 'active' : null; ?>" href="pizzerior.php"><img src="images/pizza2.png"></a>
				<a class=" <?php echo isset($page) && $page == 'varukorg.php' || $page == 'kassa.php' || $page == 'klar.php'  ? 'active' : null; ?>" href="varukorg.php"><img src="images/pizza3.png"></a>
				<a class=" <?php echo isset($page) && $page == 'kassa.php' || $page == 'klar.php' ? 'active' : null; ?>" href="kassa.php"><img src="images/pizza4.png"></a>
				<a class=" <?php echo isset($page) && $page == 'klar.php' ? 'active' : null; ?>" href="klar.php"><img src="images/pizza5.png"></a>


	</ul>




<?php

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
			break;
		case "index.php":
			$n_page = "pizzerior.php";
			$p_page_hidden = 'hidden'; //döljer previous page
			break;
		case "pizzerior.php":
			$n_page = "varukorg.php";
			$p_page = "index.php";
			break;
		case "varukorg.php":
			$n_page = "kassa.php";
			$p_page = "pizzerior.php";
			break;
		case "kassa.php":
			$n_page = "klar.php";
			$p_page = "varukorg.php";
			break;
		case "klar.php":
			$n_page_hidden = 'hidden'; //döljer next page
			$p_page = "kassa.php";
			break;

	}
?>

<!-- Pilarna på sidorna som ska navigera användaren framåt och bakåt i processen-->
<aside class="right-arrow aside">
	<a class="<?php echo $n_page_hidden; ?>" href="<?php echo $n_page;?>"><img class="shadow" src="images/right-arrow.png"/></a>
</aside>
<aside class="left-arrow aside">
	<a class="<?php echo $p_page_hidden; ?>" href="<?php echo $p_page;?>"><img class="shadow" src="images/left-arrow.png"/></a>
</aside>