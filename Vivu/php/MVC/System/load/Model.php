<?php

class Model_L
{
    public function load($model)
    {
        if(empty($this->{$model}))
        {
            $class = strtoupper($model).'_M';
            require_once WEB.'/Model/'.$model.'.php';
            if (!class_exists($class)) {
                die('class khong ton tai');
            }else
            {
                $this->{$model} = new $class();
                 //var_dump($this->{$model} );
            }
            
        }
    }
}