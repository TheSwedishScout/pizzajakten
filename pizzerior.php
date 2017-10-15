<?php
	include 'header.php';
	if (isset($_GET['ingredienser'])) {
		$ing = test_input($_GET['ingredienser']);
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


?>

<main class="left pizzerior">
	<h2></h2>
         <!-- Lista på pizzerior-->
        <img src="images/pizza7.png">
    <h3>      <?php  echo $ing; ?></h3>
</main>
<main class="right pizzerior">
	<h2></h2>
        
        <ul>
        	<li>


        	</li>
        	<li>
        		<h3>Margahreta</h3>
        		<h3>Biblos</h3>
        		<p>Drottninggatan 18, 561 31 Huskvarna</p>
        		<p>85kr</p>
        	</li>
        	<li>
        		<h3>Margahreta</h3>
        		<h3>Biblos</h3>
        		<p>Drottninggatan 18, 561 31 Huskvarna</p>
        		<p>85kr</p>
        	</li>

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