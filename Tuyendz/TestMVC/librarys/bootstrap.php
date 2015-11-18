<?php

class Bootstrap
{
    function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

          // print_r($url);

        if (empty($url[0])) {
            # code...
            require 'application/controllers/index.php';
            $controller = new Index();
            $controller->Index();
            return false;
        }

        //echo $url;

        $file = 'application/controllers/' . $url[0] . '.php';
        if (file_exists($file))
        {
            require $file;
        }
        else
        {
            require 'application/controllers/Error.php';
           $controller = new Error();
           return false;
        }

        $controller = new $url[0];


        if(isset($url[2]))
        {
            $controller->{$url[1]}($url[2]);
        }
        else
        {
            if(isset($url[1]))
            {
                $controller->{$url[1]}();
            }
            else
            {
                 $controller->Index();
    }
            }
        }


}