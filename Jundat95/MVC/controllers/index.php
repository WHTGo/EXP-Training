<?php

/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 16/11/2015
 * Time: 11:38 PM
 */
class Index extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->render('index/index');
    }

//    public function Other($arg = false)
//    {
//        echo "<br> Controller Other.";
//        echo "<br> Option choose: $arg";
//    }
}
