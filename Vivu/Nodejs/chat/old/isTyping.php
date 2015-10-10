<?php
/* ###########################################################
 * File brought to you by kkz
 * There are big ships
 * There are small ships
 * but the best ship
 * is friendship!
 * Sharing is caring... please pass this along but leave this
  ##############################################################*/

$strangerId=$_REQUEST["strangerId"];

include ('config.inc.php');
include ('ConDatabase.php');

$result    =mysqli_query($con,"SELECT * FROM typing WHERE id=$strangerId ;");

while ($row=mysqli_fetch_array($result))
    {
    echo "typing";
    }
mysqli_free_result($result);
mysqli_close ($con);
?>