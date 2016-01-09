<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controll
 *
 * @author Administrator
 */
class Controll_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->helper->load('Exten');
        $this->model->load('DataR');
        $this->model->load('DataS');
        $this->model->load('Processes');
        $this->model->load('Ramdom');
        //$this->Load_Header();
    }
    
    public function Index()
    {
        $data =  input_post('data') ;
        $this->model->DataR->ramdom=$this->model->Ramdom;
        $this->model->Processes->ramdom=$this->model->Ramdom;
        $this->model->DataR->dataJson=$data;
        $this->model->DataR->Run();
        $this->model->Processes->Security =$this->model->DataR->Security;
        $this->model->Processes->dataP = $this->model->DataR->dataRead;
        $this->model->Processes->Run();
        $this->model->DataS->DataSD=$this->model->Processes->dataP;
        $this->model->DataS->DataR = $this->model->DataR->dataRead;
        $this->model->DataS->Security =$this->model->DataR->Security;
        $this->model->DataS->dataMSG=$this->model->Processes->dataMSG;
        $this->model->DataS->MSGT=$this->model->Processes->msgTF;
        $this->model->DataS->Send();
        
    }
    
}
