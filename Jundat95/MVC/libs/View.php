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
    public  function  render($name)
    {
        require 'views/'.$name.'.php';
    }
}