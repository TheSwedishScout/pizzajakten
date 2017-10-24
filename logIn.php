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

<!--
Code taken from https://codepen.io/colorlib/pen/rxddKy
-->



<div class="login-page">
  <div class="form">
    <form method="POST" action="" class="register-form" id="register-form">
      <input type="text" required placeholder="namn" name="name"/>
      <input type="text" required placeholder="användarnamn" name="username"/>
      <input type="password" required placeholder="lösenord" name="password"/>
      <input type="text" required placeholder="email address" name="email" />
      <button>Skapa konto</button>
      <p class="errorMSG"></p>
      <p class="message">Redan registrerad? <a href="#">Logga in</a></p>
    </form>
    <form class="login-form" id="loginForm">
      <input type="text" placeholder="användarnamn" name="username"/>
      <input type="password" placeholder="lösenord" name="password"/>
      <button>Logga in</button>
      <p class="errorMSG"></p>
      <p class="message">Inte registrerad? <a href="#">Skapa ett konto</a></p>
    </form>
  </div>
</div>

<script type="text/javascript" src="js/logIn.js"></script>
<?php
	include 'footer.php';
?>