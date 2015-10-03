<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Processes
 *
 * @author Administrator
 */
require 'Ramdom.php';
class Processes_Model extends model
{
    public $ramdom;
    public $dataMSG;
    public $Security;
    public function  __construct()
    {
        parent::__construct();
        $this->db = $this->load->db->Mysqli();
        //$this->ramdom=new Ramdom();
        $this->dataMSG = new ArrayObject();
    }
    
    
    public $dataP;
    public $Messenger = array
        (
        'msg'=>'',
        'h'=>0,
        'm'=>0
        );
    
    public $msgTF = false;


    public function State_A()
    {
        //$data = array ('id'=>  $this->dataP['userID'],'time'=>'now()');
        //$this->db->db_insert('online',$data);
        $count = $this->db->db_count('select count(*) from users where id="'.$this->Security['ID'].'" and `match`="'.$this->Security['Match'].'"',0);
        if($count==0)
        {
            //echo $count;
            $sql = 'insert into users values('.$this->dataP['userID'].','.$this->Security['Match'].',"người lạ",now())';
            $this->db->Get_query($sql);
        }
        $sql = 'insert into online values('.$this->dataP['userID'].',now())';
        $this->db->Get_query($sql);
        $this->dataP['state']='a';
    }
    
    public function State_S()
    {
        $this->dataP['state']='s';
        $count = $this->db->db_count('select count(*) from chat where strangernID='.$this->dataP['userID'].' and state="y"',0);
        
        if($count==0)
        {
            $count = $this->db->db_count('select count(*) from ramdom where id="'.$this->dataP['userID'].'"',0);
            if($count==1)
            {
                $data = array ('id'=>  $this->dataP['userID']);
                $this->db->db_insert('ramdom',$data);
            }
            $idr = $this->ramdom->RamdomChat($this->dataP['userID']);
            if($idr==1)
            {
                sleep(1.5);
                $count = $this->db->db_count('select count(*) from chat where strangernID='.$this->dataP['userID'].' and state="y"',0);
                if($count==1)
                {
                    $idr = $this->db->db_count('select id from chat where strangernID='.$this->dataP['userID'].' and state="y"',0);
                    $data= array ('id'=>$this->dataP['userID'],'strangernID'=>$idr ,'state'=>'y');
                    $this->db->db_insert('chat',$data);
                    $this->dataP['strangernID'] = $idr;
                    $this->dataP['state']='n';
                }
            }else if($idr=='n')
            {
                $this->dataP['state']='s';
            }
            
        }else 
        {
            $idr = $this->db->db_count('select id from chat where strangernID='.$this->dataP['userID'].' and state="y"',0);
            $data= array ('id'=>$this->dataP['userID'],'strangernID'=>$idr ,'state'=>'y');
            $this->db->db_insert('chat',$data);
            $this->dataP['strangernID'] = $idr;
            $this->dataP['state']='n';
        }
    }
    
    public function ReaderMSG($data)
    {
        if (mysqli_num_rows($data)!=0){
            while ($row=mysqli_fetch_array($data))
            {
                    $this->Messenger['msg']=$row['msg'];
                    $this->Messenger['h']=$row['h'];
                    $this->Messenger['m']=$row['m'];
                    $this->db->Get_query('update messenger set lastS=1 where id='.$row['id'].' idR='.$this->dataP['userID']);
                    $this->dataMSG->append($this->Messenger);
            }
            $this->msgTF=true;
        }         
    }

    public function State_N()
    {
        $count = $this->db->db_count('select count(*) from messenger where idR='.$this->dataP['userID'],0);
        if($this->dataP['lastS']==true)
        {
            $this->db->Get_query('update messenger set lastS=0 and state="s" where lastS=1 and idR='.$this->dataP['userID'].' idS='.$this->dataP['strangernID']);   
        }  else 
        {
            $sql = 'select id,msg,HOUR(time) as h, MINUTE(time) as m from messenger where lastS=1 and idR='.$this->dataP['userID'].' idS='.$this->dataP['strangernID'];
            $data = $this->db->Get_query($sql);
            $this->ReaderMSG($data);
        }
        
        $count = $this->db->db_count('select count(*) from online where id='.$this->dataP['strangernID'].' and state is null ',0);
        if($count>=1)
        {
            $sql = 'select id,msg,HOUR(time) as h, MINUTE(time) as m from messenger where state is null and idR='.$this->dataP['userID'].' idS='.$this->dataP['strangernID'];
            $data = $this->db->Get_query($sql);
            $this->ReaderMSG($data);
        }
         
        $count = $this->db->db_count('select count(*) from online where id='.$this->dataP['strangernID'],0);
        if($count==0)
        {
            $this->dataP['state']='e';
        }
    }
    
    public function State_W()
    {
        //dữ online khi chờ
        $sql="UPDATE online SET time=now() WHERE id=".$this->dataP['userID'];
        $this->db->Get_query($sql);
    }
    
    public function State_E()
    {
        $this->db->db_delete('chat','id='.$this->dataP['userID']);
        $this->db->Get_query('update chat set state="n" where id='.$this->dataP['strangernID']);
    }
    
    public function Run()
    {
        if($this->dataP['state']=='a')
        {
            $this->State_A();
        }elseif ($this->dataP['state']=='s') 
        {
            $this->State_S();
        }elseif ($this->dataP['state']=='n') 
        {
            $this->State_N();
        }elseif ($this->dataP['state']=='w') 
        {
            $this->State_W();
        }elseif ($this->dataP['state']=='e') 
        {
            $this->State_E();
        }
    }
}
