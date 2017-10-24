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
    
    <div class="hittaPizzeria">
        <h1>Hitta din pizzeria</h1>
        <p>Vilka pizzaställen finns egenligen? Här har vi samlat alla pizzerior så att du lätt kan gå in och kika på hela deras menyer!</p>
    </div>
    <div class="listaPizzerior">
        <ul>
            <li><a href="http://www.pizzeria12an.se/">Pizzeria 12:an</a></li>
            <li><a href="">Pizzeria Campino</a></li>
            <li><a href="">Evergreen</a></li>
            <li><a href="">Pizzeria Bella Marie</a></li>
            <li><a href="">Pizzeria San Marino</a></li>
            <li><a href="">Pizzeria 39:an</a></li>
            <li><a href="">Pizzeria Valentio</a></li>
            <li><a href="">Pizzeria Prima</a></li>
            <li><a href="">Alcamo Pizzeria</a></li>
            <li><a href="">Pizzeria Rhodos</a></li>
            <li><a href="">Pizzeria Catania</a></li>
            <li><a href="">Pizzeria Bella</a></li>
            <li><a href="">Pizzeria Milano</a></li>
            <li><a href="">Pizzabagarna</a></li>
            <li><a href="">Mariebo Pizzeria</a></li>
            <li><a href="">Pizzeria Dalvik</a></li>
            <li><a href="">Lamia Pizzeria</a></li>
            <li><a href="">Cucchini Pizzeria </a></li>
            <li><a href="">Pizza Hut</a></li>
            <li><a href="">June Pizza Pan</a></li>
            <li><a href="">Pizzeria Santorin</a></li>
            <li><a href="">Pizzeria Pinocchio</a></li>
            <li><a href="">Pizzeria Rimini</a></li>
            <li><a href="">Tortellini Pizza o Pasta House</a></li>
            <li><a href="">Ekhagens Pizzeria</a></li>
            <li><a href="">Pizzeria Papillon</a></li>
            <li><a href="">Catarina</a></li>
            <li><a href="">GrillHouse Jönköping</a></li>
            <li><a href="">Barnarps Pizzeria</a></li>
            <li><a href="">Pizzabutiken Shalom</a></li>
            <li><a href="">Pizzeria Piri Piri Simrishamn</a></li>
            <li><a href="">Pizzeria Majstången</a></li>
            <li><a href="">Mickels Pizzeria</a></li>
            <li><a href="">Biblos</a></li>
            <li><a href="">Pizzeria Tigris</a></li>
            <li><a href="">Jönköpings Matbolag Pizza o Hamburgare</a></li>
        </ul>
    </div>
    
    

<?php
	include 'footer.php';
?>