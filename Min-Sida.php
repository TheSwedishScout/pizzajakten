<?php
	$no_balls = 'true';
	include ('header.php');
    if(!isset($_SESSION['user'])){
      header('location: logIn');
      exit();
    }

include 'assets/min-sida-tabs.php';
?>


<main class="left">
    <div class="minInfo">
        <img src="images/user.png"><br>
	<h1><?php
    
	echo($_SESSION['user']['name']);
	//var_dump($_SESSION);
	?></h1><br>

<?php
		//Cookie code from https://www.w3schools.com/php/func_http_setcookie.asp
		if(!isset($_COOKIE[$cookie_name])) {
		    echo "Välkommen! Vad kul att du är här!"; //Detta visas första gången man är inne
		} else {
		    echo "Välkommen Tillbaka! "; 
		    echo $_COOKIE[$cookie_name];//detta fr.o.m. andra gånge man är inne + 1 dag framåt
		}
?>
			        <br>
        <br><a href="assets/logOut">Logga ut</a><br>

    </div>
</main>


<main class="right">
		<?php
		 $conn = connect_to_db();
        $sql = "SELECT user.adress, user.post_nr, user.email, user.ort FROM user WHERE user.id = ? LIMIT 1";
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
        <div class="userRight">
            <h1>Uppdatera adress</h1>
            <form action="assets/updateUser" method="POST">
                <input type="text" name="adress"  required placeholder="Adress" value="<?= $userinfo['adress'] ?>">
                <input type="nmmer" name="post_nr"  required placeholder="post nr" value="<?= $userinfo['post_nr'] ?>">
                <input type="ort" name="ort"  required placeholder="Ort" value="<?= $userinfo['ort'] ?>">
                <h1>Uppdatera mailadress</h1>
                <input type="email" name="email" required placeholder="namn@domain.com" value="<?= $userinfo['email'] ?>">
                <input class="spara" type="submit" name="" value="Spara">
            </form>
                    <h1>Uppdatera lösenord</h1>
            <form action="assets/updateUserPassword"  method="POST">

                <input type="password" name="password" placeholder="********" minlength="8" required>
                <input type="password" name="password2" placeholder="********" minlength="8" required>
                <input class="spara" type="submit" name="" value="Spara">
            </form>
        </div>
	
</main>

<?php
	include 'footer.php';


//uppdatera lösen, adress, tel, mail) SELECT user.* FROM user where id = ?  |  bind ? till $_session['user_id'] | get the info
    ?>