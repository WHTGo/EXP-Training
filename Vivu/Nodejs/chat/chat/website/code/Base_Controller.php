<?php
class Base_Controller extends Controller{
    
    public function __construct($is_controller = true) {
        parent::__construct($is_controller);
    }
    public function Load_Header()
    {
        //$this->view->load('Header');
    }
    
    public function Load_Footer()
    {
         //$this->view->load('Footer');
    }
    
    public  function __destruct()
    {
        $this->view->show();
         
    }
    
    
    
    
}

?>