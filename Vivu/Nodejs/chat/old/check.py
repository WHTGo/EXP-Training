<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'web_bt';
$con=mysqli_connect($host, $user, $pass,$db)or die ('Không the ket noi toi database');


$result=mysqli_query($con,"SELECT * FROM cauhoi");

$row=mysqli_fetch_array($result);
echo $row;

?>