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
        <a href="logIn.php"><img id="user" src="images/user.png"></a> 
        <a href="varukorg.php"><img id="cart" src="images/cart.png"></a>
	</header>
	<div id="meny" class="shadow">
		<img src="images/cart.png" alt="kundvangn">
		<img src="images/star.png" alt="Favoriter">
		<img src="images/user.png" alt="min sida">
		<nav>
			<h3><a href="help.php">Hur fungerar det?</a></h3>
			<h3>Hitta din pizzeria</h3>
			<h3>Pizzerior</h3>
		</nav>
		<input type="search" placeholder="sök" name="">
	</div>

<!--
Code taken from https://codepen.io/colorlib/pen/rxddKy
-->



<div class="login-page">
  <div class="form">
    <form method="POST" action="" class="register-form">
      <input type="text" placeholder="användarnamn" name="username"/>
      <input type="password" placeholder="lösenord" name="password"/>
      <input type="text" placeholder="email address"/>
      <button>Skapa konto</button>
      <p class="message">Redan registrerad? <a href="#">Logga in</a></p>
    </form>
    <form class="login-form" id="loginForm">
      <input type="text" placeholder="användarnamn" name="username"/>
      <input type="password" placeholder="lösenord" name="password"/>
      <button>Logga in</button>
      <p class="message">Inte registrerad? <a href="#">Skapa ett konto</a></p>
    </form>
  </div>
</div>

<?php
	include 'footer.php';
?>