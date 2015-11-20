<?php
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 16/11/2015
 * Time: 11:51 PM
 */
class Help extends  Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->render('help/index',null);
    }

    public function other()
    {
        $this->view->render('help/index',null);
    }
}