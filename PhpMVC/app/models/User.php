<?php

class User extends Model
{

    function __construct()
    {
        $this->table_name = "user";
        $this->id_column = "id";
    }

    public function getName()
    {
        return 'user';
    }

}