<?php
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 17/11/2015
 * Time: 9:36 AM
 */
class Model
{
    var $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function query($sql)
    {
        return $this->db->query($sql);
    }
}