<?php 
include '../function.php'; 

$response = ['sucsses' => 'FALSE'];

//echo "systemet kollar om du är inloggad.<br>";

if (!isset($_SESSION['user_id'])){
	$nick = test_input($_POST['username']);
	$password = test_input($_POST['password']);
	$name = test_input($_POST['name']);
	$email = test_input($_POST['email']);

	/*kollar så att inte något fält är tomt*/

	if (!empty($nick) || !empty($password) || !empty($name) || !empty($email) && isEmail($email)){ //Något fält är tomt
		$conn = connect_to_db();
		$options = [
		'cost' => 10
		];
		$password_hashed = password_hash($password, PASSWORD_BCRYPT, $options);
		unset($password);
		//echo "Ditt lösenord är nu krypterat och glömt.";

		//insertinge values into mysqli server

		//echo($sql);
		$stmt = $conn->prepare("INSERT INTO user (name, username, password, email) VALUES (?,?,?,?)");
	    $stmt->bind_param("ssss", $name, $nick, $password_hashed, $email);
	    //$stmt->execute();
	    //$result = $stmt->get_result();
		if ($stmt->execute() === TRUE) { //successfully insertded values to database
			//echo "Ditt konto är nu sparat.<br>";
			//session start
			//echo "Du kan nu lägga in deltagare i våra listor.<br>";
			//$_SESSION['user_id'] = $nick;
			//mailing new user
			//send to start peage
			//header("Location: index.php");
			//exit();
			$response = ['sucsess' => true];
		}else{
			$response['error'] = "sqlError";
			
		}
	}else{
		$response['error'] = 'something is empty';
	}
}else{
	$response['error'] = 'session is set';
}
echo (json_encode($response));
?>

