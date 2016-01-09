<?php
//require_once 'models/UserModel.php';
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 19/11/2015
 * Time: 4:21 PM
 */
class User extends  Controller
{
    var $model;
    var $view;

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $users =  $this->model->getList();
        $data = array();
        $data['users'] = $users;
        $this->view->render('user/index',$data);
    }

    public function login()
    {
        $this->view->render('user/login/index',null);
    }
    public function signup()
    {
        $this->view->render('user/signup/index',null);
    }
    public function doSignup()
    {
        $data = $this->model->signup();
        $this->view->render('user/signup/signup',$data);
    }
    public function doLogin()
    {
        $data = $this->model->login();
        $this->view->render('user/login/login',$data);
    }
}