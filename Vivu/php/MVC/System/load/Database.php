<?php

class Database
{
    public function load($name)
    {
        $name =  strtoupper($name);
        
        if (!file_exists(SYSTEM."/database/".$name.".php")) {
            die('controll khong ton tai');
        };
        
        require_once SYSTEM."/database/".$name.".php";
        
        $class = $name."_DB";
        if (!class_exists($class)) {
            die('class khong ton tai');
        }

         $this->{ $name } = new $class();
         //var_dump( $this->{ $name });
    }

}