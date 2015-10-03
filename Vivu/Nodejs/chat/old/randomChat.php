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
$randomUserId=0;

$lsql="SELECT * FROM chats WHERE userId = $userId ";
$result      =mysqli_query($con,$lsql);

while ($row=mysqli_fetch_array($result))
    {
    $randomUserId=$row["randomUserId"];
    }

if ($randomUserId == 0)
    {
        
    $result=mysqli_query($con,"SELECT * FROM users WHERE id <> $userId AND inchat like 'N' AND online=1 ");

    $max=mysqli_num_rows($result);
    $in=rand(1,$max);
    $i=1;
    while ($row=mysqli_fetch_array($result))
        {
            
        $randomUserId=$row["id"];
        if ($i==$in){
            break;
        }
        $i++;
        }
    if ($randomUserId != 0)
        {
        mysqli_query($con,"INSERT INTO chats (userId,randomUserId) values($userId, $randomUserId) ");
        mysqli_query($con,"INSERT INTO chats (userId,randomUserId) values($randomUserId, $userId) ");

        mysqli_query($con,"UPDATE users SET inchat='Y' WHERE id = $userId ");
        mysqli_query($con,"UPDATE users SET inchat='Y' WHERE id = $randomUserId ");
        }
    }

echo $randomUserId;
mysqli_free_result($result);
mysqli_close($con);
?>