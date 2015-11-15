<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 14/11/2015
 * Time: 16:37
 */

$a = 5;
$b = 6;

function conghaiso()
{
    $GLOBALS['z'] = $GLOBALS['a'] + $GLOBALS['b'];
}
conghaiso();
echo $z;
echo $_SERVER['PHP_SELF'];

?>