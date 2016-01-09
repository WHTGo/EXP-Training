<?php
include_once SYSTEM."/load/View.php";
include_once SYSTEM."/load/Model.php";

class  Controll
{
    protected $View = null;
    protected $Model =  null;
    
    public function __construct()
    {
        $this->View = new View();
        $this->Model = new Model_L();
    }
}


?>