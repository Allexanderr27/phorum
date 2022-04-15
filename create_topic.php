<?php
session_start();
include 'connect.php';
include 'header.php';
if ($_SESSION['auth'] == false) {
    header('Location: authorization');
} else {
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        $_SESSION['flash'] = 'No categories';
        header('Location: /categories/create');
        exit;
    } else {

 echo '<form method="POST" action="">
    Subject: <input type="text" name="topic_subject">
    Category:<br>
    <select name="topic_cat">';

        while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['id'] . '"></option>';
        }

    echo '</select>
    Message: <textarea name="post-content"></textarea>
    <input type="submit" value="create topic">
</form>';

    }
        $query = "BEGIN WORK;";
        $result = mysqli_query($link, $query);
        if (!$result) {
            echo "An error has occured while creating your topic";
        } else {
            $topic_subject = $_POST['topic_subject'];
            $topic_cat = $_POST['topic_cat'];
            $user_id = $_SESSION['user_id'];
            $sql = "INSERT INTO `topics`(`topic_subject`, `topic_date`, `topic_cat`, `topic_by`)
                    VALUES ('$topic_subject', NOW(), '$topic_cat', '$user_id')";
            $result = mysqli_query($link, $sql);
            echo mysqli_error($link);
            if (!$result) {
                echo 'An error occured while inserting your data';
                $sql = "ROLLBACK;";
                $result = mysqli_query($link, $sql);
            } else {
                $topicid = mysqli_insert_id($link);
                $post_content = $_POST['post_content'];
                $sql = "INSERT INTO `posts`(`post_content`, `post_date`, `post_topic`, `post_by`)
                VALUES($post_content, NOW(), $topicid, $user_id)";
                $result = mysqli_query($link, $sql);
                if (!$result) {
                    echo 'An error has occured while inserting your post.';
                    $sql = "ROLLBACK;";
                    $result = mysqli_query($link, $sql);
                    } else {
                    $sql = "COMMIT;";
                    $result = mysqli_query($sql);
                    echo 'You have successfully created <a href="topic.php?id='.$topicid.'">your new topic</a>';
                }
            }
        }






}
