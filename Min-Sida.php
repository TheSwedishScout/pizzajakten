<?php
	$no_balls = 'true';
	include ('header.php');
?>
<main class="left">

	<?php
    
/*    //Annikas klåpkod
     $sql =  "SELECT user.* FROM user where id = ?";
    $stmt = $conn->prepare($sql);
		//var_dump($pizza);
		$stmt->bind_param("s", $user['user_id']);
		$stmt->execute();
		$result = $stmt->get_result();
		$user = [];
  */  
    
	echo($_SESSION['user']['name']);
	//var_dump($_SESSION);
	?>
    <ul class="minInfo">


<?php
		//Cookie code from https://www.w3schools.com/php/func_http_setcookie.asp
		if(!isset($_COOKIE[$cookie_name])) {
		    echo "Välkommen! Vad kul att du är här!"; //Detta visas första gången man är inne
		} else {
		    echo "Välkommen igen!"; 
		    echo $_COOKIE[$cookie_name];//detta fr.o.m. andra gånge man är inne + 1 dag framåt
		}
?>
	<ul>
		<li>
		</li>
		<li>
			<a href="assets/logOut.php">Logga ut</a>
			
		</li>
		<li>
			<button>Uppdatera/lägg till adress</button>
		</li>
		<li>
			<button>Uppdatera/lägg till telefonnummer</button>
		</li>
		<li>
		      <button>Uppdatera/lägg till mailadress</button>
		</li>
		<li>
		      <button>Ändra lösenord</button>
		</li> 
	</ul>

</main>


<main class="right">
		<ul>
			<li>
				orderhistorik
			</li>
		</ul>
	
</main>
<main class="right">
	
</main>
<?php
	include 'footer.php';


//uppdatera lösen, adress, tel, mail) SELECT user.* FROM user where id = ?  |  bind ? till $_session['user_id'] | get the info
    ?>