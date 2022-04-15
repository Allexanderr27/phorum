<?php
session_start();
include 'connect.php';
include 'header.php';

echo '<h3>Register</h3>';

    echo '<form method="post" class="register" action="">
          Username: <input type="text" name="user_name">
          Password: <input type="password" name="user_pass">
          Confirm password: <input type="password" name="user_pass_check">
          E-mail: <input type="email" name="user_email">
          <input type="submit" value="Add user">
          </form>';


    $username = $_POST['user_name'];
    $userpass = $_POST['user_pass'];
    $useremail = $_POST['user_email'];
    $userdate = $_POST['user_date'];
    $userlevel = $_POST['user_level'];
    
    $query = "INSERT INTO `users` (`user_name`, `user_pass`, `user_email`, `user_date`, `user_level`) 
            VALUES ('$username', '$userpass', '$useremail', NOW(),
            '0')";
    $result = mysqli_query($link, $query);
    if (!$result) {
        echo 'Something went wrong in the process';        
        echo mysqli_error($link);
    } else {
        $_SESSION['auth'] = true;
        echo 'You registered successfully';
    }
    include('footer.php');


