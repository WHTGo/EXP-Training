<?php
include_once SYSTEM."/load/Database.php";
class Model
{
        protected $db = null;
       
       public function __construct()
       {
            $this->db = new  Database();
       }
       
}