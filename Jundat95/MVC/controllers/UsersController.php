<?php
require_once 'models/Usermodel.php';
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 17/11/2015
 * Time: 2:25 PM
 */
class UsersController
{
    var $model;
    var $view;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->view = new View();
    }
    public function index()
    {
        $users =  $this->model->getList();
        $data = array();
        $data['users'] = $users;
        $this->view->render('user/index',$data);
    }




}