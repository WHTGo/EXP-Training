<?php
 if (!defined('PATH_SYSTEM'))die('Bad requested!');

class model_load
{

    public $db = null;
    
    public function __construct()
    {
        require_once PATH_SYSTEM . '/core/loader/load_db.php';
        $this->db = new load_db();
        
    }
    
}
