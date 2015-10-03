<?php

/**
 * @author gio
 * @copyright 24/5/2015
 */

class MySQL
{
    public $host;
    public $user;
    public $pass;
    public $db;
    public $conn;
    public function MySQL($_host,$_user,$_pass,$_db)
    {
        $this ->$host = $_host;
        $this ->$user =$_user;
        $this -> $pass =$_pass;
        $this -> $db = $_db;
    }
    
    public function connect()
    {
        $conn  = mysqli_connect($host, $user, $pass,$db)or die ('Không thể kết nối tới database!');
    }
    
    public function connect_Conn()
    {
        $conn  = mysqli_connect($host, $user, $pass,$db)or die ('Không thể kết nối tới database!');
        return $conn;
    }
    
    public function close()
    {
        mysqli_close($conn);
    }
    
    public function Get_query($sql)
    {
        $this -> connect();
        $table = mysqli_query($conn,$sql);
        $this -> close();
    }
}

?>