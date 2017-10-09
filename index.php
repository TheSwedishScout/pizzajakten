<?php
	include 'header.php';
	if (isset($_GET['t'])){
		$tab = test_input($_GET['t']);
	}
?>
<div class="tabs">
	<a class="shadow <?php echo !isset($tab) || $tab == 'GRÖNSAKER' ? 'active' : null; ?>" href="?t=GRÖNSAKER">GRÖNSAKER</a>
	<a class="shadow <?php echo isset($tab) && $tab == 'TOPPING' ? 'active' : null; ?>" href="?t=TOPPING">TOPPING</a>
	<a class="shadow <?php echo isset($tab) && $tab == 'KÖTT' ? 'active' : null; ?>" href="?t=KÖTT">KÖTT</a>
	<a class="shadow <?php echo isset($tab) && $tab == 'OSTER' ? 'active' : null; ?>" href="?t=OSTER">OSTER</a>
	<a class="shadow <?php echo isset($tab) && $tab == 'SÅSER' ? 'active' : null; ?>" href="?t=SÅSER">SÅSER</a>
</div>
<main class="left">
	<h2>Sid  specifikt</h2>
         <?php 
        
            $result = getIngredients('Kött');

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
               ?> <button> <?php echo $row["namn"]. $row["category"];?> </button> <?php
                }
            } 
            else {
                echo "0 results";
            }
        ?>
</main>
<main class="right">
	<h2>Sid  specifikt</h2>
</main>

<?php
	include 'footer.php';
?>