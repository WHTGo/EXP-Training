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

    }
    public function index()
    {
        $this->view->render('login/index',null);
    }
    public function login()
    {
        $data = $this->model->login();
        $this->view->render('login/login',$data);
    }

}