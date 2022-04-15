<?php

class HomeController {
    public $layout;

    public function index()
    {
        $title = 'Главная';

        $this->layout = 'default';

        $sql = "SELECT `cat_id`, `cat_name`, `cat_description` FROM `categories`";
        $categories = mysqli_query($link, $sql)->fetch_assoc();

        view('home', [
            'title' => $title,
            'categories' => $categories,
        ]);
    }
}