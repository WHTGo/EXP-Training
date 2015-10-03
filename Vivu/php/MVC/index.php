<?php
include_once "library.php";
include_once "config.php";

$controll = strtoupper(getget("controll"));
$action = strtoupper(getget("action"));
$controller = $controll."_C";

include_once SYSTEM."/Controll.php";
include_once SYSTEM.'/Model.php';
    if (!file_exists(WEB. '/controll/' . $controll . '.php')) {
        die('controll khong ton tai');
    };
    require_once WEB. '/controll/' . $controll . '.php';
    
    if (!class_exists($controller)) {
        die('class khong ton tai');
    }
    
    $controllerObject = new $controller();

    if (!method_exists($controllerObject, $action)) {
        die('action khong ton tai');
    }
    $controllerObject->$action();
?>