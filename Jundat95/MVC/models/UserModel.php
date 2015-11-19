<?php
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 17/11/2015
 * Time: 9:30 AM
 */
class UserModel extends Model
{
    public function __construct()
    {
      parent::__construct();
    }

    public function getList()
    {
        return  $this->query("SELECT * FROM users")->fetchAll();
    }
}