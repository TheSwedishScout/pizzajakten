<?php
	include 'header.php';
	if (isset($_GET['ingredienser'])) {
		$ing = test_input($_GET['ingredienser']);
		$ing = explode(",", $ing);
        $ing = implode(", ", $ing);

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
        <!--Karta på pizzerior med knappar för location, rating och price-->
        <ul>
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
        	<li>
        		<h3>Margahreta</h3>
        		<h3>Biblos</h3>
        		<p>Drottninggatan 18, 561 31 Huskvarna</p>
        		<p>85kr</p>
        	</li>
        </ul>
</main>

<?php
	include 'footer.php';
?>