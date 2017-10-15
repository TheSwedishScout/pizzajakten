
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
    <div class="helpText">
    <h1>Hej!</h1>
        <p>
        Vad roligt att du har hittat hit! <br><br>Du vet den där perfekta pizzan - Den man nästan kan drömma om ibland, den man cravar, och den man inte kan sluta prata om? Den pizzan som är lite som att hitta en soulmate. Det finns så många där ute, och det kan vara svårt att hitta helt rätt. Många är bra, men ibland kan man känna att man saknar något. När man väl hittar den då kommer du aldrig vilja äta en annan pizza igen!<br><br>
            
            Vi hjälper dig att göra sökandet lite lättare.<br> Tryck bara på de ingredienser du vill ha på din 
            pizza och vi sköter resten. Vi hittar den bästa matchen åt dig. Välj sen den pizzan du tycker ser smarrigast ut, så visar vi dig på vilka pizzerior den finns på, vad den kostar och vad andra tycker! När du har bestämt dig kan du enkelt beställa den och boka på din valda pizzeria. Hur lätt som helst! 
            <br><br>
            Vi gillar pizza, och vi gillar dig. <br>Så det här känns som en match made in heaven!</p>

            <button id="help-button" type="button"><a href="index.php">Hitta din pizza!</a></button>
    </div>

</div>


    
<?php
    include'footer.php';
?>