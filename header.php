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
?>
</head>
<body>
<div class="container">
	<header>
		<img id="burger" class="shadow" src="images/burger.png"/>
		<img src="images/Logga.png" alt="Logga">

	</header>
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
	<ul class="progretion">
		<li><img src="images/pizza1.png"></li>
		<li><img src="images/pizza2.png"></li>
		<li><img src="images/pizza3.png"></li>
		<li><img src="images/pizza4.png"></li>
		<li><img src="images/pizza5.png"></li>
	</ul>
<aside class="right-arrow aside">
	<img class="shadow" src="images/right-arrow.png"/>
</aside>
<aside class="left-arrow aside">
	<img class="shadow" src="images/left-arrow.png"/>
</aside>