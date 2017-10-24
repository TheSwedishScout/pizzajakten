<?php
//    require 'function.php';
	include 'header.php';
//An associative array of variables passed to the current script via the URL parameters. Are there ingredients in the url? checks via isset. 

	if (isset($_GET['ingredienser'])) {
		$ing = test_input($_GET['ingredienser']);
		$ingredienser = explode(",", $ing);
        $ing = implode(", ", $ingredienser);
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
	<h2></h2>
         <!-- Lista på pizzerior-->
        <img src="images/pizza7.png">
    <h3>      <?php  echo $ing; ?></h3>
</main>


<main class="right pizzerior">
	<h2></h2>
   
    <?php
//    var_dump($sql);
    if ($result->num_rows > 0) {
            echo("<ul>");
            // output data of each row
            while($row = $result->fetch_assoc()) {
//                    echo $row['pizza'];
            $conn = connect_to_db();
//                var_dump($row);
                $stmt = $conn->prepare("SELECT pizzorinpizzeria.name, pizzerior.namn, pizzerior.adress, pizzorinpizzeria.pris FROM pizzorinpizzeria, pizzerior WHERE pizzorinpizzeria.id = ? AND pizzorinpizzeria.pizzeria=pizzerior.id");
                
                $stmt->bind_param('i', $row['pizza']);
                $stmt->execute();
                $result2 = $stmt->get_result();
                    while($row2 = $result2->fetch_assoc()) { ?>
                <li>
                    <h3><?php echo($row2['name']); ?></h3>
                    <h3><?php echo($row2['namn']); ?></h3>
                    <p><?php echo($row2['adress']); ?></p>
                    <h3><?php echo($row2['pris']); ?> kr</h3>
                    <form action="">
                        <input type="submit" name="Välj denna" value="Välj pizza">
                        <input type="hidden" name="pizzeria" value="1">
                        <input type="hidden" name="pizza" value="5">
                    </form>
                </li>  
    
                <?php
                    }
                $conn->close();
            }
        }
?>
    </ul>


        	<li>
<!--        		<h3><?php var_dump($row2); ?></h3>-->
<!--
        		<h3>Biblos</h3>
        		<p>Drottninggatan 18, 561 31 Huskvarna</p>
        		<p>85kr</p>
-->
                <br>
                <br>
                <br>
                

        	</li>

<!--
        	<li>
        		<h3>Margahreta</h3>
        		<h3>Biblos</h3>
        		<p>Drottninggatan 18, 561 31 Huskvarna</p>
        		<p>85kr</p>
                
                <form action="">
                    <input type="submit" name="Välj denna" value="Välj pizza">
                    <input type="hidden" name="">
                </form>
        	</li>
            <li>
                <h3>Margahreta</h3>
                <h3>Biblos</h3>
                <p>Drottninggatan 18, 561 31 Huskvarna</p>
                <p>85kr</p>
                
                <form action="">
                    <input type="submit" name="Välj denna" value="Välj pizza">
                    <input type="hidden" name="">
                </form>
            </li>
            <li>
                <h3>Margahreta</h3>
                <h3>Biblos</h3>
                <p>Drottninggatan 18, 561 31 Huskvarna</p>
                <p>85kr</p>
                
                <form action="">
                    <input type="submit" name="Välj denna" value="Välj pizza">
                    <input type="hidden" name="">
                </form>
            </li>
            <li>
                <h3>Margahreta</h3>
                <h3>Biblos</h3>
                <p>Drottninggatan 18, 561 31 Huskvarna</p>
                <p>85kr</p>
                
                <form action="">
                    <input type="submit" name="Välj denna" value="Välj pizza">
                    <input type="hidden" name="">
                </form>
            </li>
-->

        </ul>
</main>

<?php
	include 'footer.php';
?>