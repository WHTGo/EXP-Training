<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Chat_Controller
 *
 * @author Administrator
 */
class Chat_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->helper->load('Exten');
        $this->model->load('Offline');
    }
    
    public function Index()
    {
        $this->view->load('Chat');
        $this->view->show();
    }
    
    public function Offline()
    {
        $this->model->Offline->offline();
        $this->view->load('offline');
        $this->view->show();
    }
}
