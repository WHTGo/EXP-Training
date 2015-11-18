<?php

class Login extends Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->view->render('Login/index');
	}
}