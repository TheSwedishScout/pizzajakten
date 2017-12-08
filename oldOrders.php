<?php
	$no_balls = 'true';
	include ('header.php');
    if(!isset($_SESSION['user'])){
      header('location: logIn.php');
      exit();
    }

include 'assets/min-sida-tabs.php';
?>

<main class="left tab2">
SELECT order
<?php

	//update whit Start and end dates
		$conn = connect_to_db();
		$sql = "SELECT orders.time_orderd, SUM(pizzorinpizzeria.pris) AS totalpris, COUNT(orders.id) as antal FROM orders, pizzorinpizzeria WHERE user = ? AND orders.pizza = pizzorinpizzeria.id GROUP BY time_orderd ORDER BY `orders`.`time_orderd` DESC";
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
                	$orders[] = $row;
                	$ordertime = strtotime($row['time_orderd']);
                	$ordertime = date("Y-m-d H:i", $ordertime);
                	?>
                	<li >
                		<a href="?order=<?= $row['time_orderd']; ?>">
	                		<h3><?= $ordertime; ?></h3>
	                		<p>Kostnad: <?= $row['totalpris']; ?> kr</p>
	                		<p>Antal pizzor: <?= $row['antal']; ?></p>
                		</a>
                	</li>


                	<?php
            }
            echo("</ol>");
        }
        //var_dump($orders);

?>

</main>
<main class="right tab3">
 order ditails
<?php
	if (isset($_GET['order'])) {
		# code...
	
		$time = test_input($_GET['order']);
		$conn = connect_to_db();
		$sql = "SELECT *, pizzorinpizzeria.id AS pizzaID FROM orders, pizzorinpizzeria, pizzerior WHERE orders.user = ? AND orders.time_orderd = ? AND orders.pizza = pizzorinpizzeria.id AND pizzorinpizzeria.pizzeria = pizzerior.id";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $_SESSION['user']['nr'], $time);

        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        $orders = [];
        if ($result->num_rows > 0) {
        	echo("<ul>");
                while($row = $result->fetch_assoc()) {
                	//var_dump($row);
                	?>
                	<li>
                		<a href="pizza.php?pizza=<?= $row['pizzaID'];?>">
	                		<h2><?= $row['name'];?> - <?= $row['namn'];?></h2>
	                		<p>pris: <?= $row['pris'];?> kr</p>
                		</a>
                	</li>
                	<?php
            }
            echo("</ul>");
        }
    }
      ?>
</main>

<?php
	include 'footer.php';
?>