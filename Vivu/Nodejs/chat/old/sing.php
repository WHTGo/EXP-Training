<?php
$pass=$_REQUEST["pass"];
$mail=$_REQUEST["mail"];
$name=$_REQUEST["name"];
$gio=$_REQUEST["gio"];
$date=$_REQUEST["date"];

require 'radomID.php';
include('config.inc.php');
include('ConDatabase.php');
$result=mysqli_query($con," SELECT * FROM users WHERE mail=$mail");
$count=mysqli_num_rows($result);
if (($pass==null) and (strlen($pass)>=6)){
    echo 1;
}elseif ($count!=0) {
    echo 0;
}else{
    selectID();
    ma();
    mysqli_query($con," INSERT INTO users(id,name,inchat,online,math,datet,mail,pass,reg,gio,date) VALUES($userId,$name,'N',0,$ma,now(),$mail,$pass,1,$gio,$date)");
    $val=((1000000000*$ma)+$userId);
    echo $val;
}
mysqli_free_result($result);
mysqli_close($con);

?>