<?php

class Post extends Model
{

    function __construct()
    {
        $this->table_name = "posts";
        $this->id_column = "id";
    }

}