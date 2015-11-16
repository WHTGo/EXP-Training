<?php
/**
 * Created by PhpStorm.
 * User: TuyenGa
 * Date: 11/16/2015
 * Time: 8:54 PM
 */

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

$url = $_GET['url'];

require_once (ROOT . DS . 'library' . DS . 'bootstrap.php');
