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

    }

    public function index()
    {
        $this->view->render('index/index',null);
    }
}
