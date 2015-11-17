<?php
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 17/11/2015
 * Time: 8:22 AM
 */
class Error extends  Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->msg = "This page does not exists.";
        $this->view->render('error/index');
    }
}