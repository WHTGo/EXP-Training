<?php
/* ###########################################################
 * File brought to you by kkz
 * There are big ships
 * There are small ships
 * but the best ship
 * is friendship!
 * Sharing is caring... please pass this along but leave this
  ##############################################################*/
$userId    =$_REQUEST["userId"];

$strangerId=$_REQUEST["strangerId"];
$log       ="";
include ('config.inc.php');
include ('ConDatabase.php');

$lsql="SELECT * FROM oldmsgs WHERE userId = $userId OR randomUserId = $userId order by archivedDate ;";
$result=mysqli_query($con,$lsql);
$log       =$log . "<div style='padding:15px;' >";

while ($row=mysqli_fetch_array($result))
    {
    $msg   = $row["msg"];
    $sender=$row["userId"];

    if ($sender == $userId)
        {
        $log=$log . "<div class='logitem'><div class='youmsg'><span class='msgsource'>You:</span> $msg</div></div>";
        }
    else if ($sender == $strangerId)
        {
        $log=$log
            . "<div class='logitem'><div class='strangermsg'><span class='msgsource'>Stranger:</span> $msg</div></div>";
        }
    }

$log=$log . "</div>";
mysqki_free_result($result);
mysqli_close ($con);
echo $log;
?>