<?php

/**
 * @author easyvn.net
 * @copyright 2015
 */

$userId=$_REQUEST["userId"];

include('config.inc.php');
include('ConDatabase.php');

mysqli_query($con,"DELETE FROM users WHERE id = $userId ;");
mysqli_query($con,"DELETE FROM typing WHERE id = $userId ;");
mysqli_query($con,"DELETE FROM chats WHERE userId = $userId ;");
mysqli_query($con,"DELETE FROM msgs WHERE userId = $userId ;");
mysqli_query($con,"DELETE FROM chats WHERE randomUserId = $userId ;");
mysqli_query($con,"DELETE FROM oldmsgs WHERE userId = $userId ;");
mysqli_close($con);
?>