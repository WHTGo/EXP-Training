<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataR
 *
 * @author Administrator
 */
//require 'Ramdom.php';
class DataR_Model extends model
{
    public $ramdom;
    public $dataJson;
    public function  __construct()
    {
        parent::__construct();
        $this->db = $this->load->db->Mysqli();
        //$this->ramdom=new Ramdom();
    }
    
    public $dataRead= array(
        'userID'=>0,
        'StrangernID'=>0,
        'state'=>'o',
        'Security'=>true,
        'lastS'=>true
    );
    
    public $Security = array(
        'state'=>false,
        'ID'=>0,
        'Match'=>0,
    );


    public function User($data)
    {
        $this->dataRead['userID']=$data[1];
        $this->dataRead['strangernID']=$data[2];
    }
    
    public function  State($data)
    {
        $this->dataRead['state']=$data;
        
    }
    
    public function SecurityID($data)
    {
        if ($this->dataRead['state']=='a')
        {
            $this->Security['ID']=$data[0];
            $this->Security['Match']=$data[1];
            //var_dump($this->Security);
            $count = $this->db->db_count('select count(*) from users where id="'.$data[0].'"',0);
            //var_dump($count);
            if($count==0)
            {
                $newid = $this->ramdom->newID();
                $this->Security['ID']=$newid['id'];
                $this->Security['Match']=$newid['match'];
                $this->Security['state']=true;
                //var_dump($this->Security);
            }else
            {
                $count = $this->db->db_count('select count(*) from users where id="'.$data[0].'" and `match`="'.$data[1].'"',0);
                if($count==0)
                {
                    $newid = $this->ramdom->newID();
                    $this->Security['ID']=$newid['id'];
                    $this->Security['Match']=$newid['match'];
                    $this->Security['state']=true;
                }else
                {
                    //$this->Security['Match']=  $this->ramdom->ma();
                }
            }
            $this->dataRead['userID']=$this->Security['ID'];
        }
    }
    
    public function Messenger($data)
    {
        if ($this->dataRead['state']=='n')
        {
            $data = array('id'=>  $this->ramdom->rd(),'idS'=>  $this->dataRead['userID'],'idR'=> $this->dataRead['strangernID'],'msg'=>$data,'time'=>'now()');
            $this->db->db_insert('Messenger',$data);
        }
    }
    
    public function RMSG($id)
    {
        $this->db->Get_query('update chat set state="v" where id='.$id);
    }
    
    public function Run()
    {
        
        $header = $this->dataJson[0];
        //var_dump($this->$dataRead);
        foreach ($header as $id)
        {
            switch ($id)
            {
                case '2': $this->User($this->dataJson[2]);          break;
                case '1': $this->State($this->dataJson[1]);         break;
                case '3': $this->SecurityID($this->dataJson[3]);    break;
                case '4': $this->Messenger($this->dataJson[4]);     break;
                case '7': $this->dataRead['lastS']=  $this->dataJson[7]; break;
            }
        }
    }
}
