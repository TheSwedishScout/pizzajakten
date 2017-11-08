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
		<a href="index.php" class="logga"><img src="images/logotyp.svg" alt="Logga"></a>
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
                    <button>Tillbaka</button>
    </div>
    
    <div class="listaPizzerior">
        <ul>
                <?php    
                //en while loop får ut resultat, så länge det finns saker kvar att visa
                    $conn = connect_to_db();
                    $result = $conn->query("SELECT namn, url FROM pizzerior");
                    while($row = $result->fetch_assoc()) {
                    //Echoar ut namn plus länk i en lista
                    ?> 
                        <li>
                            <a target="_blank" href="<?php echo $row['url'];?>"><?php echo $row['namn']; ?> </a>
                        </li>
                        <?php
                    }      
                    ?>
        </ul>
    </div>


<?php
	include 'footer.php';
?>