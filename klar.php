<?php
	include 'header.php';
	if (isset($_POST['mail'])){
		$mail = test_input($_POST['mail']);
	}

    if (isset($_POST['firstname'])){
        $name = test_input($_POST['firstname']);
    }


?>



<main class="left">
	<h2>Sid  specifikt</h2>
         <?php
            $to      = $mail;
            $firstname = $name;
            $subject = 'Pizzaleverans';
            $message = "MUMS {$name}! Din pizza är klar om 15 minuter en kvart! Smaklig måltid!";
            $headers = 'From: noreply@pizzajakten.se' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
        ?>

</main>
<main class="right">
	<h2>Sid  specifikt</h2>
</main>

<?php
	include 'footer.php';
?>