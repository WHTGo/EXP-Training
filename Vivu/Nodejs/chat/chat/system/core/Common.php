<?php
 if (!defined('PATH_SYSTEM'))die('Bad requested!');

function load() {
    $config = include_once PATH_APPLICATION . '/config/init.php';

    /* neu khong truyen controller thi lay controller mac dinh
     * neu khongt truyen action thi lay action mac dinh
     * * */

   $controller = empty($_GET['c']) ? $config['default_controller'] : $_GET['c'];
    $action= empty($_GET['a']) ? $config['default_action']: $_GET['a'];

    // chuyen doi ten cotroller vi no co dinh dang {name}_controller.php 
    $controller = ucfirst(strtolower($controller)) . '_Controller';

    $action = ucfirst($action);// . 'Action';

    //kiem tra xem file cotroller co ton tai hay khong

    if (!file_exists(PATH_APPLICATION . '/controller/' . $controller . '.php')) {
        die('controller khong ton tai');
    };
    
    // include de cac controller ke thua
    
        include_once PATH_SYSTEM.'/core/Controller.php';
        if (file_exists(PATH_APPLICATION . '/core/Base_Controller.php')){
            include_once PATH_APPLICATION . '/core/Base_Controller.php';
        }
    //goi model
    include_once PATH_SYSTEM.'/core/Model.php';
    
    
    //neu co thi goi no ra
    require_once PATH_APPLICATION . '/controller/' . $controller . '.php';

    // kiem tra classcotroller co ton tai hay khong

    if (!class_exists($controller)) {
        die('class khong ton tai');
    }

    // khoi tao $controllerObject

    $controllerObject = new $controller();


    // kiem tra actinon co ton tai hay khong
    if (!method_exists($controllerObject, $action)) {
        die('action khong ton tai');
    }

    
    // goi toi action

    $controllerObject->$action();
}

?>
