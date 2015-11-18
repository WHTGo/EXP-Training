<?php

/**
 * Created by PhpStorm.
 * User: TuyenGa
 * Date: 11/18/2015
 * Time: 7:35 PM
 */
class Error extends Controller
{
    function __construct()
    {
        parent::__construct();
        
    }
       function Index()
	{
		 $this->view->msg= 'page khong the thoat !! ';
		 $this->view->render('error/index');
	}
}