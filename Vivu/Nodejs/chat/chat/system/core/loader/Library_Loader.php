<?php
class Library_Loader{
    
    
    public function load($library,$args = array()){
        
        // neu thu vien chua dc load thi thc hien load
        
    if(empty($this->{$library})){
            // chuyen chu dau tien thanh chu hoa
            
            $class = ucfirst($library).'_Library';
            
            require_once PATH_SYSTEM.'/library/'.$class.'.php';
            
        $this->{$library} = new $class($args);
            
            
        }
    }
}

?>