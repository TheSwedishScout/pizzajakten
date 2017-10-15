<?php
	include 'header.php';
	if (isset($_GET['ingredienser'])) {
		$ing = test_input($_GET['ingredienser']);
		
	}
?>

<main class="left pizzerior">
	<h2></h2>
         <!-- Lista på pizzerior-->
        <img src="images/pizza7.png">
    <h3>Skinka, ost, tomatsås, chaminjoner, bearnaisessås, kött, bacon, osv </h3>
</main>
<main class="right pizzerior">
	<h2></h2>
        
        <ul>
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