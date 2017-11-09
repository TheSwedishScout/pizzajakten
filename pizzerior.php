<?php
	include 'header.php';
    //An associative array of variables passed to the current script via the URL parameters. Are there ingredients in the url? checks via isset. 

	if (isset($_GET['ingredienser'])) {
		$ing = test_input($_GET['ingredienser']);
		$ingredienser = array_map('test_input',explode(",", $ing));       //explode - split a string. 
        $ing = implode(", ", $ingredienser);       //Implode - joins array-elements as a string
        $query = "'".implode("', '", $ingredienser). "'";
        $amount = count($ingredienser);
        $conn = connect_to_db();
        $sql = "SELECT ingredienseronpizza.pizza, pizzorinpizzeria.id, pizzorinpizzeria.name, pizzerior.id as pid, pizzerior.namn, pizzerior.adress, pizzorinpizzeria.pris FROM ingredienseronpizza, pizzorinpizzeria, pizzerior WHERE ingredienseronpizza.pizza = pizzorinpizzeria.id AND pizzorinpizzeria.pizzeria=pizzerior.id GROUP BY ingredienseronpizza.pizza HAVING SUM(IF (ingredienseronpizza.ingrediens IN ({$query}), 1, 100 )) = {$amount};";
            /*
            Väljer pizzor som har de valda ingredienser genom att ge ett värde på 100 till ingrediener som inte är valda och 1p till de som är valda och summerar upp dessa, kollar sedan om det talet är likamed antalet ingredienser som är valda
            */
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $stmt ="";
        $conn->close();
    }else{ // Om inga ingrediense är valda så skriv ut en simpel sida istället.
        ?>
        <main class="left pizzerior">
            <h1>Inga valda ingredienser</h1>
            <br>
            <br>
            <p><a href="index.php">Börja om!</a></p>
        </main>
        <main class="right pizzerior">
            
        </main>

        <?php
        include 'footer.php';
        die();
    }
?>
<main class="left pizzerior">
         <!-- Lista på ingredienser-->
        <img src="images/pizza7.png">
        <h3><?php echo $ing; ?></h3>
</main>
<main class="right pizzerior">
    <?php
        if ($result->num_rows > 0) {
               //skapar ett ul-element för det vi sedan visar upp
                echo("<ul>");
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    ?>
                    <li>
                        <!--                                
                        Här väljer vi ut de delar från arrayen row vi vill echo'a ut. Vi gör li-element för varje som hjälper oss med styling
                        -->
                        <h2><a href="pizza.php?pizza=<?= $row['id']; ?>"><?php echo($row['name']); ?></a></h2>
                        <h3><a href="pizzeria.php?pizzeria=<?= $row['pid']; ?>"><?php echo($row['namn']); ?></a></h3>
                        <p><?php echo($row['adress']); ?></p>
                        <h3><?php echo($row['pris']); ?> kr</h3>
                        <form action="varukorg.php" method="POST">
                            <input type="submit" name="Välj denna" value="Välj pizza">
                            
                            <input type="hidden" name="pizza" value="<?php echo $row['id'] ?>">
                        </form>
                    </li>  
                    <?php
                }
            }
        ?>
    </ul>
</main>

<?php
	include 'footer.php';
?>