<?php
	$no_balls = 'true';
	include ('header.php');
    if(!isset($_SESSION['user'])){
      header('location: logIn');
      exit();
    }

include 'assets/min-sida-tabs.php';
?>

<main class="left tab2">
SELECT order
<?php

	//update whit Start and end dates
		$conn = connect_to_db();
		//$sql = "SELECT * FROM favorites WHERE user = ?";
        /*$sql = "SELECT ingredienseronpizza.pizza, 
                       pizzorinpizzeria.favorits, 
                       pizzorinpizzeria.id, 
                       pizzorinpizzeria.name, 
                       pizzerior.id as pid, 
                       pizzerior.namn, 
                       pizzerior.adress, 
                       pizzorinpizzeria.pris 
                FROM ingredienseronpizza, pizzorinpizzeria, pizzerior, favorites
                WHERE 
                       favorites.user = ? AND
                       favorites.pizza = pizzorinpizzeria.id AND
                       ingredienseronpizza.pizza = pizzorinpizzeria.id AND 
                       pizzorinpizzeria.pizzeria=pizzerior.id 
                ";*/
        $sql = "SELECT pizzorinpizzeria.id, pizzorinpizzeria.name, pizzorinpizzeria.pizzanr, pizzorinpizzeria.pris, GROUP_CONCAT(ingredienseronpizza.ingrediens) as ingredienser from pizzorinpizzeria, ingredienseronpizza, favorites WHERE favorites.user = ? AND pizzorinpizzeria.id =  ingredienseronpizza.pizza AND favorites.pizza = pizzorinpizzeria.id GROUP BY ingredienseronpizza.pizza";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $_SESSION['user']['nr']);

        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        $orders = [];
        if ($result->num_rows > 0) {
        	echo("<ol>");
                while($row = $result->fetch_assoc()) {
                	printPizzaAdd($row);
            }
            echo("</ol>");
        }
        //var_dump($orders);

?>

</main>
<main class="right tab3">
</main>

<?php
	include 'footer.php';
?>