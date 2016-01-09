<?php
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 19/11/2015
 * Time: 3:46 PM
 */
class Database extends PDO
{
    var $conf;
    public function __construct()
    {
        $conf = new Config();
        parent::__construct("mysql:host=$conf->servername;dbname=$conf->dbname",$conf->username,$conf->password);
    }

}