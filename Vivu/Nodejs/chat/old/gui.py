<?php
 $name=$_REQUEST["name"];
 $msg=$_REQUEST["msg"];
 
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'web_bt';
$con=mysqli_connect($host, $user, $pass,$db)or die ('Kh�ng the ket noi toi database');


$result=mysqli_query($con,"INSERT INTO cauhoi VALUE ('$name','$msg')");

if(!$result){
    echo(" g?i th�nh c�ng.");
}else{
    echo("L?i k?t n?i t?i c� s? d? li?u!");
}

?>