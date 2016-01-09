<?php
 if (!defined('PATH_SYSTEM'))die('Bad requested!');

class model
{
    protected $db = null;
    protected $load = null;
    
    public function __construct()
    {
        require_once PATH_SYSTEM . '/core/loader/model_load.php';
        $this->load = new model_load();
        
    }
    
    
}

