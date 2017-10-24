<?php
    //require 'function.php';
	include 'header.php';
    //An associative array of variables passed to the current script via the URL parameters. Are there ingredients in the url? checks via isset. 

	if (isset($_GET['ingredienser'])) {
		$ing = test_input($_GET['ingredienser']);
		$ingredienser = explode(",", $ing);       //explode - split a string. 
        $ing = implode(", ", $ingredienser);       //Implode - joins array-elements as a string
        $query = "'".implode("', '", $ingredienser). "'";
        $amount = count($ingredienser);
        $conn = connect_to_db();
        $sql = "SELECT ingredienseronpizza.pizza FROM ingredienseronpizza, pizzorinpizzeria
        WHERE ingredienseronpizza.pizza = pizzorinpizzeria.id AND ingredienseronpizza.ingrediens IN ({$query})
        GROUP BY ingredienseronpizza.pizza
        HAVING COUNT(*) = {$amount};";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
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
                $conn = connect_to_db();
                    //Gör ett statement där vi "joinar" de olika databaserna och sätter samman informationen, där id't sedan är dynamiskt utifrån vad vi tidigare valt
                    $stmt = $conn->prepare("SELECT pizzorinpizzeria.id, pizzorinpizzeria.name, pizzerior.namn, pizzerior.adress, pizzorinpizzeria.pris FROM pizzorinpizzeria, pizzerior WHERE pizzorinpizzeria.id = ? AND pizzorinpizzeria.pizzeria=pizzerior.id");
                    $stmt->bind_param('i', $row['pizza']); //i är för integer, alltså det vi får ut från id't
                    $stmt->execute();
                    $result2 = $stmt->get_result();
                        while($row2 = $result2->fetch_assoc()) { ?>
                            <li>
                                <!--                                
                                Här väljer vi ut de delar från arrayen row2 vi vill echo'a ut. Vi gör li-element för varje som hjälper oss med styling
                                -->
                                <h3><?php echo($row2['name']); ?></h3>
                                <h3><?php echo($row2['namn']); ?></h3>
                                <p><?php echo($row2['adress']); ?></p>
                                <h3><?php echo($row2['pris']); ?> kr</h3>
                                <form action="varukorg.php" method="POST">
                                    <input type="submit" name="Välj denna" value="Välj pizza">
                                    
                                    <input type="hidden" name="pizza" value="<?php echo $row2['id'] ?>">
                                </form>
                            </li>  
                            <?php
                        }
                    $conn->close();
                }
            }
        ?>
    </ul>
</main>

<?php
	include 'footer.php';
?>