<?php

class TopicController {
    public function index($categoryId)
    {

    }

    public function create()
    {
        $topic_subject = $_POST['topic_subject'];
        $topic_cat = $_POST['topic_cat'];
        $user_id = $_SESSION['user_id'];
        $sql = "INSERT INTO `topics`(`topic_subject`, `topic_date`, `topic_cat`, `topic_by`)
                    VALUES ('$topic_subject', NOW(), '$topic_cat', '$user_id')";
        $result = mysqli_query($link, $sql);
    }
}