<?php
 if (!defined('PATH_SYSTEM'))die('Bad requested!');

class load_db
{
    public function __construct()
    {
        
    }
    
    public function Mysqli()
    {
        require_once PATH_SYSTEM . '/database/db_mysqli.php';
        return $db = new database();
    }
}
