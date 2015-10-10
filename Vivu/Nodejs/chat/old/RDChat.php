<?php

/**
 * @author easyvn.net
 * @copyright 2015
 */
 
include ('config.inc.php');
include ('ConDatabase.php');

 
$lsql="SELECT id, COUNT(id) AS told  FROM chats WHERE userId != $userId, set=fale;, set=null";
$result      =mysqli_query($con,$lsql);

$max=$result["told"];
if ($max==0){
    $randomUserId=0;
}
else
{
    

    $in=rand(1,$max);
    $i=1;
    while ($row=mysqli_fetch_array($result))
        {
            
        $randomUserId=$row["randomUserId"];
        if ($i==$in){
            break;
        }
        $i++;
        }
}
echo $randomUserId;

mysqli_free_result($result);
mysqli_close($con);
?>