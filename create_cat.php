<?php
session_start();
include 'connect.php';
include 'header.php';
if (!$_SESSION['auth'] &&
    $user = $db->queryOne("SELECT * FROM users where id=%d and active=1", $_SESSION['user_id'])
) {
    header('Location: authorization.php');
} else {
    $catname = $_POST['cat_name'];
    $description = $_POST['cat_description'];
    $query = "INSERT INTO `categories` (`cat_name`, `cat_description`) VALUES ('$catname', '$description')";
    $result = mysqli_query($link, $query);
    if (!$result) {
        echo "Error";
        echo mysqli_error($link);
    } else {
        echo 'New category has been successfully added';
    }
}
?>
<form method="POST" action="">
    Category name: <input type="text" name="cat_name">
    Category description:
        <textarea name="cat_description"></textarea>

    <input type="submit" value="Add category">
</form>
<?php
include 'footer.php';
?>
