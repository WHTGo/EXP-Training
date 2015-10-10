<?php

class DATABASE_M extends Model
{
    public function __contruct()
    {
        parent::__construct();
        
    }
    
    public function load()
    {
        $this->db->load("Mysql");
    }
    
    public function login($user,$pass)
    {
        //var_dump($this->db);
        //$this->db->load("Mysql");
        //var_dump($this->db->MYSQL);
        $data =  $this->db->MYSQL->Query("select * from `user` where `user`='$user' and `pass`='$pass'");
        if(mysqli_num_rows($data))
        {  
            $row = mysqli_fetch_array($data,MYSQLI_NUM);
            return array('login' => 1,'id'=> $row["id"]);
        }
        return array("login"=>0);
    }
    
    public function manager($page,$select)
    {
        
        if($select==1)
        {
            $count =  $this->db->MYSQL->Query("select count(*) from `user`");
            $count_d = mysqli_fetch_assoc($count);
            $count_v = $count_d["count(*)"];
            if($count_v>20)
            {
                $a_page = $count_v/20 + $count_v%20; 
            }else{ $a_page =1; }
            return array("allpage"=>$a_page,"count"=>$count_v);
        }
        else
        {
            $data =  $this->db->MYSQL->Query("select * from `user` limit $page, 20 ");
            if(mysqli_num_rows($data)>0)
            {  
                return $data;
            }
        }
    }
    
    public function add($user,$pass)
    {
        $erro = 0;
        $data =  $this->db->MYSQL->Query("select * from `user` where `user`='$user'");
        if(mysqli_num_rows($data))
        {  
            $erro=1;
        }
        else
        {
            $data =  $this->db->MYSQL->Query("insert into user(`user`,`pass`) values('$user',$pass); ");
            if($data)
            {
                $erro =0;
            }
        }
        return $erro;
    }
}