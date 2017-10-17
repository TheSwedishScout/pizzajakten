<?php
//    require 'function.php';
	include 'header.php';
//An associative array of variables passed to the current script via the URL parameters. Are there ingredients in the url? checks via isset. 

	if (isset($_GET['ingredienser'])) {
		$ing = test_input($_GET['ingredienser']);
<<<<<<< HEAD
		$ing = explode(",", $ing);
        $ing = implode(", ", $ing);
	}
//
//		$conn = connect_to_db();
//		$sql = "SELECT 'namn' FROM `ingredienser` WHERE id=?";
//		if ($result = $conn->query($sql)) {
//			while ($row = $result->fetch_assoc()) {
//		    }
//		}
//		$conn->close();
////
//    if (isset($_GET['namn'])) {
//        $pizzeriaNamn = test_input($_GET['namn']);
//		$pizzeriaNamn = explode(",", $pizzeriaNamn);
//        $pizzeriaNamn = implode(", ", $pizzeriaNamn);
//    }
=======
		$ingredienser = explode(",", $ing);
        $ing = implode(", ", $ingredienser);

        $query = "'".implode("', '", $ingredienser). "'";
        $amount = count($ingredienser);
        $conn = connect_to_db();
        /*
        $sql = "SELECT 'namn' FROM `ingredienser` WHERE id=?";
        if ($result = $conn->query($sql)) {
            while ($row = $result->fetch_assoc()) {
            }
        }*/
        $sql = "SELECT ingredienseronpizza.pizza FROM ingredienseronpizza, pizzorinpizzeria
        WHERE ingredienseronpizza.pizza = pizzorinpizzeria.id AND ingredienseronpizza.ingrediens IN ({$query})
        GROUP BY ingredienseronpizza.pizza
        HAVING COUNT(*) = {$amount};";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();


#ost, skinka, tomatsås, tonfisk

        $conn->close();
	}
//
  //  if (isset($_GET['namn'])) {
  //      $pizzeriaNamn = test_input($_GET['namn']);
		// $pizzeriaNamn = explode(",", $pizzeriaNamn);
  //      $pizzeriaNamn = implode(", ", $pizzeriaNamn);
  //  }


>>>>>>> 28c5492546f089a92e0e2038b36833bd16e7bd4d
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
    var_dump($sql);
    if ($result->num_rows > 0) {
            echo("<ul>");
            // output data of each row
            while($row = $result->fetch_assoc()) {
                var_dump($row);
            }
        }
        ?>
        
        <ul>
        	<li>
        		<h3>Margahreta</h3>
        		<h3>Biblos</h3>
        		<p>Drottninggatan 18, 561 31 Huskvarna</p>
        		<p>85kr</p>
                
                <form action="">
                    <input type="submit" name="Välj denna" value="Välj pizza">
                    <input type="hidden" name="pizzeria" value="1">
                    <input type="hidden" name="pizza" value="5">
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

        </ul>
</main>

<?php
	include 'footer.php';
?>