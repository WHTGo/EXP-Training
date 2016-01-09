<?php
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 21/11/2015
 * Time: 8:46 AM
 */
class Order extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public  function  index()
    {
        $data = $this->model->getList();
        $this->view->render('order/index',$data);
    }
    public function add()
    {
        $this->view->render('order/add/index',null);
    }
    public  function doAdd()
    {
        $data = $this->model->add();
        $this->view->render('order/add/doadd',$data);
    }
}