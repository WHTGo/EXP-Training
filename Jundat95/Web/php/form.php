<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15/11/2015
 * Time: 08:32
 */
$name = $_POST['name'];
$pass = $_POST['pass'];

if($name == "jundat95" && $pass == "tinhtang")
{
    echo "Chao ".$name."<br>";
    echo "Ban da dang nhap thanh cong.";
}
else
{
    echo "Ban da dang nhap that bai.";
}

?>