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
		<img src="images/Logga.png" alt="Logga">
        <img id="user" src="images/user.png">
        <img id="cart" src="images/cart.png">
	</header>
	<div id="meny" class="shadow">
		<img src="images/cart.png" alt="kundvangn">
		<img src="images/star.png" alt="Favoriter">
		<img src="images/user.png" alt="min sida">
		<nav>
			<h3>Hur fungerar det?</h3>
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
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form">
      <input type="text" placeholder="username"/>
      <input type="password" placeholder="password"/>
      <button>login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>

<?php
	include 'footer.php';
?>