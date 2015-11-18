<?php
/**
 * Created by PhpStorm.
 * User: TuyenGa
 * Date: 11/18/2015
 * Time: 2:25 PM
 */

class Help extends Controller
{
    function __construct()
    {
        parent::__construct();
    }


        function Index()
    {
         $this->view->render('help/index');
    }

    public function orther($arg = false)
    {



        require 'application/models/help_model.php';
        $model = new Help_Model();
        $this->view->blah =$model->blah();
    }

}