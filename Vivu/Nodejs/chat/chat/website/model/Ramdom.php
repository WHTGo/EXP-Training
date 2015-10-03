<?php
class Ramdom_Model  extends model
{
    public function  __construct()
    {
        parent::__construct();
        $this->db = $this->load->db->Mysqli();
    }
    
    public function rd()
    {
        $t0=rand(0,9);
        $t1=rand(1,9);
        $t2=rand(0,9);
        $t3=rand(0,9);
        $t4=rand(0,9);
        $t5=rand(0,9);
        $t6=rand(0,9);
        $t7=rand(0,9);

        $id=($t0+(10000000*$t1)+(1000000*$t2)+(100000*$t3)+(10000*$t4)+(1000*$t5)+(100*$t6)+(10*$t7));
        return $id;
    }

    function ma()
    {
        $t0=rand(0,9);
        $t1=rand(1,9);
        $t2=rand(0,9);
        $t3=rand(0,9);
        $ma=((10000*$t3)+(1000*$t2)+(100*$t1)+(10*$t0));
        return $ma;
    }
    
    function newID()
    {
        $userId=$this->rd();
        $count = $this->db->db_count('select count(*) from users where id="'.$userId.'"',0);
        while($count!=0)
        {
            $userId=rd();
            $count = $this->db->db_count('select count(*) from users where id="'.$userId.'"',0);
        }
         $match=$this->ma();
         $data= array ('id'=>$userId,'match'=>$match);
         $this->db->db_insert('users',$data);
         return $data;
    }
    
    public function RamdomChat($id)
    {
        $idr=0;
        set_time_limit(5);
        //var_dump($idr);
        while($idr==0)
        {
            //đoản bảo mk chưa đk chọn
            sleep(0.5);
            $count = $this->db->db_count('select count(*) from ramdom where id='.$id.' and sign is null',0);
             if ($count==0)
            {
                //chưa đk chọn
                //bước 1
                $tong = $this->db->db_count('select count(*) from ramdom',0);
                $a=0;
                while (($idr!=$id)&&($idr==0))
                {
                    if($a==20)
                    {
                        return 'n';
                    }else
                    {
                        $stt = rand(0, $tong);
                        $idr = $this->db->db_count('select id from ramdom limit '.$stt.',1',0);
                    }
                    $a++;
                    //echo '5';
             
                }
               // $data= array ('id'=>$userId,'sign'=>$match);
                //$this->db->db_insert('user',$data);
                //bước 2
                $idF = $this->db->Get_query('update ramdom set sign='.$id.' where id='.$idr);
                $this->db->db_delete('ramdom','id='.$id);

                sleep(0.5);
                $count = $this->db->db_count('select count(*) from ramdom where id='.$idr.' and sign='.$id,0);
                if($count==1)
                {
                    $data= array ('id'=>$id,'strangernID'=>$idr ,'state'=>'y');
                    $this->db->db_insert('chat',$data);
                    $this->db->db_delete('ramdom','id='.$idr);
                    return $idr;
                }else
                {
                    $idr=0;
                    $data = array ('id'=> $id);
                    $this->db->db_insert('ramdom',$data);
                }
            }else 
            {
                // được chọn trình hoãn 2s vào xem bảng chat
                return 1;
            }
        }
        echo '3';
        //var_dump($idr);
    }
    
}
