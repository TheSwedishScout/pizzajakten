<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pizza jakten</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<link rel="stylesheet" type="text/css" href="../css/main.css">

	<script src="https://use.typekit.net/iau7beu.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
<?php
	require '../function.php';
	$link = explode('/', $_SERVER['REQUEST_URI']);
	$page = end($link);

?>
</head>
<body>
    <div class="container">

        <header>
            <img id="burger" class="shadow" src="../images/burger.png"/>
            <a href="../index.php" class="logga"><img src="../images/Logga.png" alt="Logga"></a>
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
            <input type="search" placeholder="sök" name="">
        </div>
        
<main class="left">
	<?php
	$conn = connect_to_db();
	$sql = "SELECT `id`, `namn` FROM `pizzerior`";
	$result = $conn->query($sql);
	$rows = $result->fetch_all(MYSQLI_ASSOC);
		
	?>
	<h2>Välj pizzeria/pizza som ska updateras</h2>
	<form method="GET">
		Välj pizzeria
		<select name="pizzeria">
			<?php
			if (isset($_GET['pizzeria']) && !empty($_GET['pizzeria'])) {
				$pizzeria = (int)test_input($_GET['pizzeria']);
			}else{
				$pizzeria = NULL;
			}
				foreach ($rows as $row) {
					$select = "";
					if ($pizzeria == $row['id']) {
						$select = "selected";
					}
					echo "<option {$select} value='".$row['id']."'>{$row['namn']}</option>";
				}
			?>
		</select>
		<input type="submit" name="">
	</form>
	<?php
	if (isset($_GET['pizzeria']) && !empty($_GET['pizzeria'])) {
		$pizzeria = (int)test_input($_GET['pizzeria']);
		$sql = "SELECT * FROM `pizzorinpizzeria` WHERE `pizzeria` = ? ORDER BY `pizzanr` ASC";
		$stmt = $conn->prepare($sql);
	    $stmt->bind_param("i", $pizzeria);
	    $stmt->execute();
	    $result = $stmt->get_result();
        //var_dump($result);
        if ($result->num_rows > 0) {
        	echo("<ul>");
            // output data of each row
            while($row = $result->fetch_assoc()) {
            	//var_dump($row); //Enskild pizza in pizzeria
            	?>
            	<li class="pizza">
	            	<h3><?php echo($row['pizzanr'].") ".$row['name']) ?></h3>
	            	<p><?php echo($row['pris']); ?>kr </p>
	            	<ul>
	            	
	            	<?php
	            	$sql = "SELECT ingrediens FROM ingredienseronpizza where pizza = ?";
					$stmt = $conn->prepare($sql);
				    $stmt->bind_param("i", $row['id']);
				    $stmt->execute();
				    $resultingred = $stmt->get_result();
				    while($rowingred = $resultingred->fetch_assoc()) {
				    	//var_dump($rowingred);
				    	foreach ($rowingred as $ingred) {
				    		?>
				    		<li><?php echo($ingred); ?></li>
				    		<?php
				    	}

				    }
				    ?>
					</ul>
					<button>edit</button>
				</li>
			    <?php
            }
        	echo("<ul>");
        }
	
		?>
		<form method="GET">
			
		</form>
		<?php
	}
	?>
</main>
<main class="right">
	
</main>
<?php
	include 'footer.php';
?>