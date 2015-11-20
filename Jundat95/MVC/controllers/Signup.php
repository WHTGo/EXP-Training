<?php
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 20/11/2015
 * Time: 3:40 PM
 */
class Signup extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }
    public function index()
    {
        $this->view->render('signup/index',null);
    }
    public function signup()
    {
        $data = $this->model->signup();
        $this->view->render('signup/signup',$data);
    }
}