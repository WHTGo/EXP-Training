<?php
/* ###########################################################
 * File brought to you by kkz
 * There are big ships
 * There are small ships
 * but the best ship
 * is friendship!
 * Sharing is caring... please pass this along but leave this
 ##############################################################*/
$id=$_REQUEST["id"];

include('config.inc.php');
include ('ConDatabase.php');
if ($id!=0){
    mysqli_query($con,"UPDATE users SET online=1, datet=now() WHERE id=$id");
}

$result=mysqli_query($con,'SELECT * FROM users WHERE online=1');
$count=mysqli_num_rows($result);
echo $count;
mysqli_free_result($result);
mysqli_close($con);
?>