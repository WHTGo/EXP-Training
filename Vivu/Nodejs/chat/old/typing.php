<?php
/* ###########################################################
 * File brought to you by kkz
 * There are big ships
 * There are small ships
 * but the best ship
 * is friendship!
 * Sharing is caring... please pass this along but leave this
  ##############################################################*/
$userId=$_REQUEST["userId"];


include('ConDatabase.php');
$lsql='SELECT * FROM typing WHERE id=$userId';
$result=mysqli_query($con,$lsql);
$flag  =false;

while ($row=mysqli_fetch_array($result))
    {
    $flag=true;
    }

if (!$flag)
    {
    mysqli_query($con,"INSERT INTO typing(id) VALUES($userId); ");
    }
mysqli_free_result($result);
mysql_close($con);
?>