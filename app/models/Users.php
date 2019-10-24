<?php

use Phalcon\Mvc\Model;

class Users extends Model
{
    public $id;
    public $name;
    public $email;

    public static function findFirst($id = null)
    {
        return parent::findFirst($id);
    }
}