<?php

/**
 * Created by PhpStorm.
 * User: TuyenGa
 * Date: 11/18/2015
 * Time: 7:49 PM
 */
class View
{
    function __construct()
    {
        // echo 'Day la View !! </br>';	
    }

    public function render($name,$noInclude = false)
    {

            if($noInclude == true)
            {
                require 'application/views/'.$name.'.php';
            }
            else
            {
                require 'application/views/header.php';
                require 'application/views/'.$name.'.php';
                require 'application/views/footer.php';
            }
            
    }
}