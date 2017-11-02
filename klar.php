<?php
	include 'header.php';
	if (isset($_POST['mail'])){
		$mail = test_input($_POST['mail']);
	}

    if (isset($_POST['firstname'])){
        $name = test_input($_POST['firstname']);
    }

?>



<img id="klar-pic" src="images/klar2.png">



         <?php
            $to      = $mail;
            $firstname = $name;
            $subject = 'Pizzaleverans';
            $message = "MUMS {$name}! Din pizza är klar om 15 minuter en kvart! Smaklig måltid!";
            $headers = 'From: noreply@pizzajakten.se' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers); //Mailar till ens angivna email när man har tryckt på submit



            $_SESSION['shopping-cart'] = []; //Gör att sessionen avslutas och tidigare beställning rensas (startar om på 0 beställningar)
        ?>




<?php
	include 'footer.php';
?>