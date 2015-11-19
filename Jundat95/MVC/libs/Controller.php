<?php
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 17/11/2015
 * Time: 8:39 AM
 */
class Controller
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function loadModel($name)
    {
        //var_dump($name);
        $path = 'models/'.$name.'Model.php';

        if(file_exists($path))
        {
            require 'models/'.$name.'Model.php';
            $modelName = $name.'Model';
            $this->model = new $modelName();
        }
    }
}