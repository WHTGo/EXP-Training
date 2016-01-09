<?php

/**
 * Created by PhpStorm.
 * User: chuli
 * Date: 22/10/2015
 * Time: 5:45 SA
 */
class db_connect
{
    public function connect()
    {
        $servername = "localhost";
        $username = "root";
        $password ="";

        try {
            $conn = new PDO("mysql:host = $servername;dbname=quanlykhachsan", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch (PDOException $e)
        {
            echo "Kết nối thất bại : " . $e->getMessage();
        }
        return  $conn;
    }
    public function tblData($sql)
    {
        return $table =  $this->connect()->query($sql)->fetchAll();
    }
    public function query($sql)
    {
        $this->connect()->query($sql);
    }
}