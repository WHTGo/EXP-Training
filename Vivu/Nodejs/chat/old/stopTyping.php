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
$lsql="DELETE FROM typing WHERE id = $userId ";

mqsqli_query($con,$lsql);


mysqli_close($con);
?>