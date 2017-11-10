<?php
	$no_balls = 'true';
	include ('header.php');
    if(!isset($_SESSION['user'])){
      header('location: logIn.php');
      exit();
    }
?>
<ul class="tabs">
	<li>
		<a href="index.php">Starta här</a>
	</li>
    <?php
        if($_SESSION['user']['lvl'] >= 2){
            ?>
            <li>
                <a href="./admin">admin</a>
            </li>
            <?php           
        }  
    ?>
</ul>

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
        <br><a href="assets/logOut.php">Logga ut</a><br>

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
            <form action="assets/updateUser.php" method="POST">
                <input type="text" name="adress" value="<?= $userinfo['adress'] ?>">
                <input type="nmmer" name="post_nr" value="<?= $userinfo['post_nr'] ?>">
                <input type="ort" name="ort" value="<?= $userinfo['ort'] ?>">
                <h1>Uppdatera mailadress</h1>
                <input type="email" name="email" value="<?= $userinfo['email'] ?>">
                <input class="spara" type="submit" name="" value="Spara">
            </form>
                    <h1>Uppdatera lösenord</h1>
            <form action="assets/updateUserPassword.php"  method="POST">

                <input type="password" name="password" placeholder="********">
                <input type="password" name="password2" placeholder="********">
                <input class="spara" type="submit" name="" value="Spara">
            </form>
        </div>
	
</main>

<?php
	include 'footer.php';


//uppdatera lösen, adress, tel, mail) SELECT user.* FROM user where id = ?  |  bind ? till $_session['user_id'] | get the info
    ?>