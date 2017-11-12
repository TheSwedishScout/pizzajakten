<?php
    $no_balls = 'true';
    include ('header.php');
?>
    
    <div class="hittaPizzeria">
        <h1>Hitta din pizzeria</h1>
        <p>Vilka pizzaställen finns egenligen? Här har vi samlat alla pizzerior så att du lätt kan gå in och kika på hela deras menyer!</p>
                    <button><a href="index.php" >Tillbaka</a></button>
    </div>
    
    <div class="listaPizzerior">
        <ul>
                <?php    
                //en while loop får ut resultat, så länge det finns saker kvar att visa
                //hämtar namn och url till pizzeriorna
                    $conn = connect_to_db();
                    $result = $conn->query("SELECT id, namn FROM pizzerior");
                    while($row = $result->fetch_assoc()) {
                    //Echoar ut namn plus länk i en lista
                    ?> 
                        <li>
                            <a target="_blank" href="pizzeria.php?pizzeria=<?= $row['id'];?>"><?php echo $row['namn']; ?> </a>
                        </li>
                        <?php
                    }      
                    ?>
        </ul>
    </div>


<?php
	include 'footer.php';
?>