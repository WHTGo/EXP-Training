<?php

class Login extends Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}


	function Index()
	{
		$this->view->render('Login/index');
	}
}