<?php

/* xy lys action thong qua file boostrap
 * __DIR__ lay ra thu muc
 * */

// duong dan toi he thong
define('PATH_SYSTEM', __DIR__ . '/system');
define('PATH_APPLICATION', __DIR__ . '/admin');

// lay thong so cau hinh
require PATH_SYSTEM.'/config/config.php';
// khoi tao mang chua $controller && $action

//require file controller.php

include_once PATH_SYSTEM.'/core/Common.php';

//chuong trinh chinh
FT_load();


?>