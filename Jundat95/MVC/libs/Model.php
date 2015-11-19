<?php
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 17/11/2015
 * Time: 9:36 AM
 */
class Model
{
    var $conn;
    public function __construct()
    {
        $conf = new Config();
        try
        {
            $this->conn = new PDO("mysql:host=$conf->servername; dbname=$conf->dbname",$conf->username,$conf->password);
            //$this->conn = new PDO("mysql:host=localhost; dbname=services",'root','');

        }catch (PDOException $ex)
        {
            print $ex;
            die();
        }
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }
}