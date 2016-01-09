<?php
class Model_Loader
{
    
    
    public function load($model)
    {
            // neu thu vien chua dc load thi thc hien load
            
        if(empty($this->{$model}))
        {
            $class = ucfirst($model).'_Model';
            // chuyen chu dau tien thanh chu hoa
            require_once PATH_APPLICATION.'/model/'.$model.'.php';
                
                
            $this->{$model} = new $class();
        }
    }
}

?>