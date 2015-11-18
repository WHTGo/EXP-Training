<?php
/**
 * Created by PhpStorm.
 * User: TuyenGa
 * Date: 11/17/2015
 * Time: 5:33 PM
 */
$mysqli = new mysqli("localhost","root"," ","framework",3306);
if($mysqli->connect_error)
{
    echo "Ket noi khong thanh cong toi MYSQL: (".$mysqli->connect_error.")".$mysqli->connect_error;
}

echo $mysqli->host_info ."\n";

?>


