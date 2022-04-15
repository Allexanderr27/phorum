<?php

class DB
{
    private $link;

    public function __construct()
    {


    }

    public function queryOne($sql, ...$args)
    {
        return mysqli_query(
            $this->link,
            sprintf($sql, $args)
        )->fetch_object();
    }
}