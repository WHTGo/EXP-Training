<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Offline
 *
 * @author Administrator
 */
class Offline_Model extends model
{
    public function  __construct()
    {
        parent::__construct();
        $this->db = $this->load->db->Mysqli();
    }
    
    public function offline()
    {
        $sql ='DELETE FROM online WHERE DATE_ADD(time, INTERVAL 60 SECOND) < now()';
        $this->db->Get_query($sql);
    }
    
}
