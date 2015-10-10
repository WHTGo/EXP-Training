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

include('config.inc.php');
include('ConDatabase.php');

mysqli_query($con,"UPDATE users SET inchat='N' WHERE id = $userId ;");

mysqli_query($con,"DELETE FROM chats WHERE userId = $userId ;");

mysqli_query($con,"DELETE FROM chats WHERE randomUserId = $userId ;");

mysqli_close($con);
?>