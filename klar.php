<?php
	include 'header.php';
	if (isset($_POST['mail'])){
		$mail = test_input($_POST['mail']);
	}

    if (isset($_POST['firstname'])){
        $name = test_input($_POST['firstname']);
    }

?>

<div class="done">



<img id="klar-pic" src="images/klar2.png">



         <?php
            $to = $mail;
            $firstname = $name;
            $subject = 'Pizzaleverans';
            $message = "MUMS {$name}! Din pizza är klar om 15 minuter en kvart! Smaklig måltid!";
            $headers = 'From: '.OUTEMAIL . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers); //Mailar till ens angivna email när man har tryckt på submit
        $conn = connect_to_db();
        //save order

        $sql= "INSERT INTO orders(user, pizza) values(?, ?)"; // Förbererder sql statementen
        foreach ($_SESSION['shopping-cart'] as $pizza) { // ser till att gå igenom alla pizzor i orden och lägger tilldem 
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $_SESSION['user']['nr'], $pizza['id']); // Binder user nr (id) och pizzans id för att läggas in i databasen
            $stmt->execute();
        }

    

        $_SESSION['shopping-cart'] = []; //Gör att sessionen avslutas och tidigare beställning rensas (startar om på 0 beställningar)
    
        ?>
	<a href="/"><button><p>Forsätt handla</p></a></button></li>
</div>


<?php
	include 'footer.php';
?>