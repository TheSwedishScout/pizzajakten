<?php 
//testar så det inte finns några felaktiga tecken för sql och html. Bra säkerhet!
function test_input($data) { //$data är värdet av det vi skriver i fälten
    //trim tar bort alla tomma tecken i början och slutet av strängen 
	$data = trim($data);
    // sätter \ framför fnuttar och specialtecken för att ta bort funktionalitete
	$data = stripslashes($data);
    //omvandlar åäö och andra specialtecken till säkra html tecken
	$data = htmlspecialchars($data);

	$conn = connect_to_db();
    //gör exakt som sql
	$data = mysqli_real_escape_string ( $conn , $data );

	return $data;
	$conn->close();
}

function connect_to_db(){
	include_once("config.php");
	$conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die(mysqli_error());

	if ($conn->connect_error) {

		die("Connection failed: " . $conn->connect_error);

	} 

	$sql_main = "SET NAMES 'utf8'";
	$result = $conn->query($sql_main);
	//mysqli::set_charset('utf8'); // when using mysqli

	/*$sql_second ="CHARSET 'utf8'";
	$result = $conn->query($sql_second);
	//sets utf-8 as CHARSET in mySQL§
	/* change character set to utf8 */
	if (!mysqli_set_charset($conn, "utf8")) {
	    printf("Error loading character set utf8: %s\n", mysqli_error($conn));
	}
	
	return $conn;
}
function sendActivationCode($userid){

	// hämta kontkt uppgifter från db

	//Skapa en aktiverings kåd och spara i db 

	$to = $mail;
	$firstname = $name;
	$subject = 'Pizzaleverans';
	$message = "


	";
	$headers = 'From: no-reply@scouten.se' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();

	mail($to, $subject, $message, $headers); //Mailar till ens angivna email när man har tryckt på submit
	$conn = connect_to_db();
	//save order
}

/*function getIngredients($kategori='')
{
	$conn = connect_to_db();
	$stmt = $conn->prepare("SELECT namn, category FROM ingredienser WHERE category = ? ");
	$stmt->bind_param('s', $kategori);
	$stmt->execute();
	$result = $stmt->get_result();

	$conn->close();
	return $result;
}*/

function printPizza($pizzaid){
	$conn = connect_to_db(); //connectar till databas
			$SQL = 'SELECT GROUP_CONCAT(ingredienseronpizza.ingrediens) AS ing, pizzerior.namn, pizzorinpizzeria.id, pizzorinpizzeria.name, pizzorinpizzeria.pizzeria, pizzorinpizzeria.pris FROM pizzorinpizzeria, pizzerior, ingredienseronpizza WHERE pizzorinpizzeria.id = ? AND pizzorinpizzeria.pizzeria = pizzerior.id AND pizzorinpizzeria.id = ingredienseronpizza.pizza GROUP BY pizzorinpizzeria.id'; //Definerar vad som ska hämtas ifrån databasen
			$stmt = $conn->prepare($SQL); //prepare statment SQL förfrågan till databas
			$stmt->bind_param("i", $pizzaid); //Lägger värden på där de står frågetecken i texten
			$stmt->execute(); //execute förfrågan till databas
			//var_dump($stmt);
			//var_dump($stmt);
			$res = $stmt->get_result(); //Ger vairablen-namn till de columner som hämtas i databasen så att det är lättare att läsa koden sen,
			$row = $res->fetch_assoc();
			$row['ing'] = str_replace(",", ", ", $row['ing']);
			//var_dump($pizzaid);


			?>	
			<ul>
				<form method="post">
				<!--Denna kod skriver ut i en tabell alla de saker som hämtats från db-->
				<li class="Pizza_namn"><a href="pizza.php?pizza=<?= $row['id'];?>"><?php echo $row["name"]; ?></a><input class="raderaKnapp" type="submit" name="delete" value="Ta bort"></li>
				<li><p><?= $row['ing']; ?></p></li>
				<!--<li><?php echo $row["pizza_ingredienser"]; ?></li>-->
				<li class="Pizza_pris"><?php echo $row["pris"]; ?> kr</li> 
				<input type="hidden" name="pizzaid" value="<?php echo $row['id'] ?>">

				</form>
			</ul>
			<?php
			//skickar tillbaka Pizzerians namn
			return $row['namn'];
}
function getFavorites()
{
	if(isset($_SESSION['user']['nr'])){
            // Hämta favorit markerade pizzor
		$conn = connect_to_db();
        $sql = "SELECT favorites.pizza FROM favorites WHERE user = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $_SESSION['user']['nr']);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $favorites = [];
        if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $favorites[] = $row['pizza'];
            }
        }
        return $favorites;
    }else{
    	return array();
    }
}
function printPizzaAdd($pizza){
	
$ingredienser = explode(",", $pizza['ingredienser']);
	?>
    <li>
        <h2><a href="pizza.php?pizza=<?= $pizza['id']; ?>"><?php echo($pizza['name']); ?></a> 
        <?php 
            if(isset($_SESSION['user'])){ 
                //$ost = in_array($pizza['id'], $favorites);
                    /*var_dump($pizza['id']);
                    var_dump($favorites);
                    var_dump($ost);*/
                $favorites = getFavorites();
                if(isset($favorites)){
                    if(in_array($pizza['id'], $favorites)){
                    ?>
                        <a value="<?= $pizza['id']; ?>" href="#" class="star stared"></a>
                    <?php
                    }else{
                    ?> 
                            <a value="<?= $pizza['id']; ?>" href="#" class="star"></a>
                    <?php 
                    }
                }else{
                    ?> 
                        <a value="<?= $pizza['id']; ?>" href="#" class="star"></a>
                    <?php 
                }
            }
            ?>
            </h2>
             <form action="varukorg.php" method="POST">
            <input type="submit" name="Välj denna" value="Välj pizza">
            
            <input type="hidden" name="pizza" value="<?php echo $pizza['id'] ?>">
        </form>
        <ul class="allaPizzor">
        <?php 
            foreach ($ingredienser as $ingrediens) {
                ?>
                <li><?= $ingrediens; ?></li>
                <?php
            }
        ?>
        </ul>
             <p><?= $pizza['pris']; ?> kr</p><br>
    </li>
	<?php
}
function printBurger($dirtotop, $items_in_cart)
{	
	?>
	<div id="meny" class="shadow">
		<div class="links">
			
		<a href="<?= $dirtotop; ?>/varukorg.php">
			<img src="<?= $dirtotop; ?>/images/cart.png" alt="Varukorg">
			<div class="counter counter1"><?php echo $items_in_cart; ?></div><!-- Echoar ut antal saker som ska ligga i varukorgen-->
			<small>Varukorg</small>
		</a>
		<!--<img src="images/star.png" alt="Favoriter">-->
		<?php 
		//länkar min-sida ikonen till min sida eller login sidan beroende på om man ör inloggad eller ej
		if(isset($_SESSION['user'])){ 
        	echo '<a href="Min-Sida.php"><img src="'.$dirtotop.'/images/user.png" alt="min sida"><small>Min sida</small></a>';
		}else{
        	echo '<a href="logIn.php"><img src="'.$dirtotop.'/images/user.png" alt="logga in"><small>Logga in</small></a>';
		}

		?>
		</div>
		<nav>
            <h3><a href="<?= $dirtotop; ?>/">Hem</a></h3>
            <h3><a href="<?= $dirtotop; ?>/help.php">Hur fungerar det?</a></h3>
            <h3><a href="<?= $dirtotop; ?>/hittaPizzeria.php">Hitta din pizzeria</a></h3>
		</nav>
		<!--<input type="search" placeholder="sök" name="">-->
	</div>
	<?php
}
?>