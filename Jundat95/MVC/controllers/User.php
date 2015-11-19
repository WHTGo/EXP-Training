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

        //$this->model = new UserModel();
       // $this->view = new View();
    }
    public function index()
    {
        $users =  $this->model->getList();
        $data = array();
        $data['users'] = $users;
        $this->view->render('user/index',$data);
    }
}