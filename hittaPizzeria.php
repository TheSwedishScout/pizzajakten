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
<body>
<div class="container">
		<header>
		<img id="burger" class="shadow" src="images/burger.png"/>
		<a href="index.php"><img src="images/Logga.png" alt="Logga"></a>
        <img id="user" src="images/user.png">
        <img id="cart" src="images/cart.png">
	</header>
	<div id="meny" class="shadow">
		<img src="images/cart.png" alt="kundvangn">
		<img src="images/star.png" alt="Favoriter">
		<img src="images/user.png" alt="min sida">
		<nav>
            <h3><a href="help.php">Hur fungerar det?</a></h3>
            <h3><a href="hittaPizzeria.php">Hitta din pizzeria</a></h3>
		</nav>
		<input type="search" placeholder="sök" name="">
	</div>
    <div class="hittaPizzeria">
        
        <h1>Hitta din pizzeria</h1>
        <p>Vilka pizzaställen finns egenligen? Här har vi samlat alla pizzerior så att du lätt kan gå in och kika på hela deras menyer!</p>

    </div>


<?php
	include 'footer.php';
?>