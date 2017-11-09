<?php
	require 'header.php';
?>
    <ul class="admin">
        <li><h2>Välkommen till adminpanelen! <br><br>Vill du...</h2></li> 
        <li><a href="update.php"><button><p>Uppdatera en pizza</p></a></button></li>
        <li><h2>eller..</h2></li>      
        <li><a href="input.php"><button><p>Lägg till en ny pizza</p></a></button></li>
        <li><h2>eller..</h2></li>
        <li><a href="input.php"><button><p>Lägg till en pizzeria</p></a></button></li>
    </ul>
    <?php
	include '../footer.php';
    ?>