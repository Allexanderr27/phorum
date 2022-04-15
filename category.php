<?php
include 'connect.php';
include 'header.php';
if (!$_SESSION['auth']) {
    header('Location: authorization.php');
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM categories WHERE id = mysqli_real_escape_string($id)";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        echo 'The category cannot be found, try again later';
    } else {
        if (mysqli_num_rows($result) == 0) {
            echo 'This category does not exist';
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<h2>' . 'Topics in category' . '</h2>';
            }
            $sql = "SELECT * FROM `topics` WHERE category_id = mysqli_real_escape_string($id)";
            $result = mysqli_query($result);
        }
    }
}
include 'footer.php';
