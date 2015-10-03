<?php

$id=$_REQUEST["id"];
include('config.inc.php');
include('ConDatabase.php');
$sql="UPDATE users SET online=1, datet=now() WHERE id=$id";
//$sql='UPDATE users SET online=1 WHERE id=34116025';
mysqli_query($con,$sql);
echo " sussecfull";
mysqli_close($con);
?>