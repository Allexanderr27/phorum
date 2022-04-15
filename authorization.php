<?php
session_start();
include 'connect.php';
include 'header.php';

$username = mysqli_real_escape_string($link, $_POST['user_name']);
$userpass = mysqli_real_escape_string($link, $_POST['user_pass']);
$query = "SELECT *` FROM `users` WHERE `name` = '$username' AND `password` = '$userpass'";
$result = mysqli_query($link, $query);
if (!$result) {
    echo 'Something went wrong';
    echo mysqli_error($link);
} else {
    if (mysqli_num_rows($result) == 0) {
        echo 'You entered wrong username and/or password';
    } else {
        $_SESSION['auth'] == true;

        while ($row = mysqli_fetch_assoc($result)) {

            $_SESSION['user_id'] = $row['user_id'];


        }
    }
    echo "Welcome ";
}
?>
<h3>Authorization</h3>;
<form method="post" class="authorization" action="">
    <p style="color:red;"><?php if (!$_SESSION['auth']) echo "You need to authorize to create a new category" ?></p><br>
    Username: <br><input type="text" name="user_name"><br>
    Password: <br><input type="password" name="user_pass"><br>
    <input type="submit" value="Submit">
    <p>Not registered yet? <a href="register.php">Register</a>, please</p>
</form>;
<?php
include ('footer.php');