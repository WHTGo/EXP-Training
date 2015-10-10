<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataS
 *
 * @author Administrator
 */
class DataS_Model extends model
{
    public function  __construct()
    {
        parent::__construct();
        $this->db = $this->load->db->Mysqli();
    }
    public $DataSD;
    public $DataR;
    public $Security;
    public $dataMSG;
    public $MSGT;

    public function State_O()
    {
        $header = new ArrayObject(array(0=>'1',1=>'2'));
        $count = $this->db->db_count('select count(*) from online',0);
        return new ArrayObject(array(0=>$header,1=>'o',2=>$count));
    }
    
    public function State_A()
    {
        $header =  new ArrayObject( array(0=>'1',1=>'2',2=>'3'));
        $count = $this->db->db_count('select count(*) from online',0);
        return  new ArrayObject( array(0=>$header,1=>'a',2=>$count,3=>  $this->Security));
    }
    
    public function State_S()
    {
        $header = new ArrayObject( array(0=>'1',1=>'2',2=>'4'));
        $count = $this->db->db_count('select count(*) from online',0);
        $stranger= new ArrayObject(  array(0=>  $this->DataSD['strangernID']));
        return new ArrayObject(  array(0=>$header,1=>$this->DataSD['state'],2=>$count,4=> $stranger));
    }
    
    public function State_N()
    {
        if($this->MSGT==true)
        {
            $header = array(0=>'1',1=>'2',5=>'5');
            $count = $this->db->db_count('select count(*) from online',0);
            return array(0=>$header,1=>'n',2=>$count,5=>$this->dataMSG);
        }  else 
        {
            $header = array(0=>'1',1=>'2');
            $count = $this->db->db_count('select count(*) from online',0);
            return array(0=>$header,1=>'n',2=>$count);
        }   
    }
    
    public function State_W()
    {
        $header = array(0=>'1',1=>'2');
        $count = $this->db->db_count('select count(*) from online',0);
        return array(0=>$header,1=>'w',2=>$count);
    }
    
    public function State_E()
    {
        if($this->MSGT==true)
        {
            $header = array(0=>'1',1=>'2',5=>'5');
            $count = $this->db->db_count('select count(*) from online',0);
            return array(0=>$header,1=>'e',2=>$count,5=>$this->dataMSG);
        }  else 
        {
            $header = array(0=>'1',1=>'2');
            $count = $this->db->db_count('select count(*) from online',0);
            return array(0=>$header,1=>'e',2=>$count);
        }
    }
    
    public function Send()
    {
        //var_dump($this->Security);
        $data;
        switch ($this->DataR['state'])
        {
            case 'o': $data= $this->State_O();                  break;
            case 'a': $data= $this->State_A();                 break;
            case 'n': $data = $this->State_N();                break;
            case 's': $data = $this->State_S();                break;
            case 'w': $data = $this->State_W();               break;
            case 'e': $data = $this->State_E();                break;
        }
       // var_dump($data);
        echo json_encode($data);
    }
}
