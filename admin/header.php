<?php 
session_start();
$link = explode('/', $_SERVER['REQUEST_URI']);
$page = end($link);

//Vi kollar på vilken sida vi är på. Om vi är på index.php på adminpanelen och vi INTE är inloggade (!isset) så tas vi till en länk där det står logga in. 
    if($page='index.php' && !isset($_SESSION['user'])){
         ?> <a href="../logIn.php">Logga in här</a>
  <?php
        die();
    }
    //Gör så vi har ryggen fri från felmeddelanden. jämför här även lvl och vilken nivå de har. om det inte är satt skickas de till logg-in
    if (!isset($_SESSION['user']) && !isset($_SESSION['user']['lvl'])){
        //SLÄNG UT DOM   
            $response['error'] = 'Du har inte behörighet att fortsätta';
            header("location:../logIn.php"); 
            die();
        }
    //Om user level är lägre än 2 så användaren de inte admin-lvl. De skickas tillbaka till förstasidan.
    if ($_SESSION['user']['lvl']<2){
        $response['error'] = 'Du har inte behörighet att fortsätta';
        header("location:../index.php"); 
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pizza jakten</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/no_balls.css">
	<script src="https://use.typekit.net/iau7beu.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
	<!-- ****** faviconit.com favicons ****** -->
	<link rel="shortcut icon" href="../images/favicon/favicon.ico">
	<link rel="icon" sizes="16x16 32x32 64x64" href="../images/favicon/favicon.ico">
	<link rel="icon" type="image/png" sizes="196x196" href="../images/favicon/favicon-192.png">
	<link rel="icon" type="image/png" sizes="160x160" href="../images/favicon/favicon-160.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../images/favicon/favicon-96.png">
	<link rel="icon" type="image/png" sizes="64x64" href="../images/favicon/favicon-64.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../images/favicon/favicon-32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../images/favicon/favicon-16.png">
	<link rel="apple-touch-icon" href="../images/favicon/favicon-57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="../images/favicon/favicon-114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="../images/favicon/favicon-72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="../images/favicon/favicon-144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="../images/favicon/favicon-60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="../images/favicon/favicon-120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="../images/favicon/favicon-76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="../images/favicon/favicon-152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="../images/favicon/favicon-180.png">
	<meta name="msapplication-TileColor" content="#FFFFFF">
	<meta name="msapplication-TileImage" content="../images/favicon/favicon-144.png">
	<meta name="msapplication-config" content="../images/favicon/browserconfig.xml">
	<!-- ****** faviconit.com favicons ****** -->
<?php
	require '../function.php';
?>
</head>
<body>
<div class="container">
	<header>
		<img id="burger" class="shadow" src="../images/burger.png"/>
		<a href="../index.php" class="logga"><img src="../images/logotyp.svg" alt="Logga"></a>
		<a href="../logIn.php"><img id="user" src="../images/user.png"></a> 
		<a href="varukorg.php"><img id="cart" src="../images/cart.png"></a>
	</header>

	<!-- Hamburgermenyns innehåll -->	
	<div id="meny" class="shadow">
		<a href="../varukorg.php"><img src="../images/cart.png" alt="kundvangn"></a>
		<!--<img src="images/star.png" alt="Favoriter">-->
		<a href="../logIn.php"><img src="../images/user.png" alt="min sida"></a>
		<nav>
			<h3><a href="../help.php">Hur fungerar det?</a></h3>
			<h3><a href="../hittaPizzeria.php">Hitta din pizzeria</a></h3>
		</nav>
		<!--<input type="search" placeholder="sök" name="">-->
	</div>
	
	<ul class="tabs">
		<li><a href="index.php">hem</a></li>
		<li><a href="input.php">Ny pizzeria</a></li>
		<li><a href="update.php">updatera pizzor</a></li>
	</ul>