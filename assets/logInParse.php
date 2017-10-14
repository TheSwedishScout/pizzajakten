<?php
//$password = $_POST['password'];
//$username = $_POST['username'];
include ("function.php");


session_start();

if (!isset($_SESSION['user_id'])){
    session_unset();
    $in_user_lvl = 0;
    if (isset($_POST['user_lvl'])){
        $in_user_lvl = test_input($_POST['user_lvl']);
    }
    /*$pre_page = test_input($_POST['page']);  FIXAAA */
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    
    $sql = "SELECT password, user_lvl, name, username FROM `user` WHERE `username` = ? OR email = ?";
    //echo($sql);
    $conn = connect_to_db();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();
        //var_dump($result);
        if ($result->num_rows > 0) {
            // output data of each row
            $row = $result->fetch_assoc();
            
            $password_hashed = $row['password'];
            
            if (password_verify($password, $password_hashed)) {
                //echo 'Password is valid!';
                $_SESSION['user_id'] = $row['username'];
                $_SESSION['user_lvl'] = $row['user_lvl'];
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['userip'] = $_SERVER['REMOTE_ADDR']; // SÄKERTHETs grej så att ingen kan komma in på samma session!!
                //send to start peage
                //header("Location: $pre_page");
                //exit;
                echo (json_encode(['sucsess'=> true, 'user_name' => $row['name'], 'user_lvl' => $row['user_lvl']]));
            } else {
                echo (json_encode(['sucsess'=> false, 'error' =>"username or password incorrect"]));
                
                //send to start peage
                //header('Location: login.php?status=password_wrong');
                //exit;
                
                
            }
            
        } else {
                echo (json_encode(['sucsess'=> false, 'error' =>"username or password incorrect"]));
            //header('Location: login.php?status=username_wrong');
               // exit;
        }
        mysqli_close($conn);
}       else {
                echo (json_encode(['sucsess'=> false, 'error' =>"already signd in"]));
    //echo "du är redan inloggad";
    //send to start peage
    //header('Location: anmalan.php');
    //exit;
}
?>