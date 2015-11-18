<?php
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 17/11/2015
 * Time: 10:46 AM
 */
class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->render('login/index');
    }
}