<?php
	$no_balls = 'true';
	include ('header.php');
?>
<ul class="tabs">
	<li>
		<a href="index.php">Starta här</a>
	</li>
</ul>

<main class="left">

	<?php
    
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
		<?php
		 $conn = connect_to_db();
        $sql = "SELECT * FROM user WHERE id = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $_SESSION['user']['nr']);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                	$userinfo = $row;
                    
            }
        }
        //var_dump($userinfo)
		?>
		<form action="assets/updateUser.php">
			<input type="text" name="adress" value="<?= $userinfo['adress'] ?>">
			<input type="nmmer" name="post_nr" value="<?= $userinfo['post_nr'] ?>">
			<input type="ort" name="adress" value="<?= $userinfo['town'] ?>">
			<input type="email" name="email" value="<?= $userinfo['email'] ?>">
			<input type="submit" name="" value="Spara">
		</form>
		<form action="assets/updateUserPassword.php">

			<input type="password" name="password" value="<?= $userinfo['password'] ?>">
			<input type="password" name="password" value="<?= $userinfo['password'] ?>">
			<input type="submit" name="" value="Spara">
		</form>
	
</main>

<?php
	include 'footer.php';


//uppdatera lösen, adress, tel, mail) SELECT user.* FROM user where id = ?  |  bind ? till $_session['user_id'] | get the info
    ?>