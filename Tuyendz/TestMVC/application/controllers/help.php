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
        $this->view->render('help/index');
    }


    public function orther($arg = false)
    {
        echo '  Toi la orther !! </br>';
        echo 'Cai Dat: ' .$arg.'</br> ';


        require 'application/models/help_model.php';
        $help_model = new Help_Model();
    }

}