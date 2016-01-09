<?php
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 17/11/2015
 * Time: 8:57 AM
 */
class View
{
    public function __construct()
    {

    }

    public  function  render($name,$data = false)
    {
            if($data == true)
            {
                require 'views/header.php';
                require 'views/' . $name . '.php';
                require 'views/footer.php';
            }
            else
            {
                require 'views/header.php';
                require 'views/' . $name . '.php';
                require 'views/footer.php';
            }
    }
}