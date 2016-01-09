<?php

class MYSQL_DB
{
    private $set = null;
    private $host = "localhost";
    private $database = "kiemtra" ;
    private $pass = "";
    private $name = "root";
    
    public function __contruct()
    {
        //$this->database = $CFmysqli["database"];
        //$this->host = $CFmysqli["host"];
        //$this->name = $CFmysqli["name"];
        //$this->pass = $CFmysqli["pass"];
    }
    
    //public function get(){ var_dump($this); }
    public function connect()
    {
         $this->set = new mysqli($this->host,$this->name,$this->pass,$this->database);
         $this->set->set_charset('utf8');
         if($this->set->errno !== 0)
         {
             die("L?i: Không th? k?t n?i t?i co s? d? li?u. L?i t?i ".$this->set->error." .");
         }
    }
    
    public function disconnect()
    {
        $this->set->close();
    }
    
      public function Query($sql)
    {
        $this -> connect();
        $table = $this->set->query($sql);
        $this -> disconnect();
        return $table;
    }
}