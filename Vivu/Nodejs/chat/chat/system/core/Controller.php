<?php

if (!defined('PATH_SYSTEM'))
    die('BAR REQUEST');

class Controller {
    /* tao doi  tuong view
     * doi tuong model
     * doi tuong libriry
     * doi tuong helper
     * doi tuong config
     * 
     * * */

    protected $view = NULL;
    protected $model = NULL;
    protected $library = NULL;
    protected $helper = NULL;
    protected $config = NULL;

    /**
     * khoi tao ham __construct  load  nhung thu vien van thiet   
     * */
    public function __construct($is_controller = true) {

        //load config
        require_once PATH_SYSTEM . '/core/loader/Config_Loader.php';
        $this->config = new Config_Loader();
        $this->config->load('config');

        //load library

        require_once PATH_SYSTEM . '/core/loader/Library_Loader.php';
        $this->library = new Library_Loader();
        
        
        //laod helper chua cac function su lys chuoi
        
        require_once PATH_SYSTEM.'/core/loader/Helper_Loader.php';
        $this->helper= new Helper_Loader();
        
        
        // load view
        
        require_once PATH_SYSTEM.'/core/loader/View_Loader.php';
        $this->view = new View_Loader();
        
        
        // Load model
        require_once PATH_SYSTEM.'/core/loader/Model_Loader.php';
        $this->model = new Model_Loader();
        
        

        
    }

}

?>
