<?php

/**
 * @author easyvn.net
 * @copyright 2015
 */
$mail=$_REQUEST["mail"];
$pass=$_REQUEST["pass"];

include('config.inc.php');
include('ConDatabase.php');

$result=mysqli_query($con," SELECT id,math FROM users WHERE mail=$mail AND pass=$pass ");
$count=mysqli_num_rows($result);
if ( $count==0){
    echo 0;
}else{
   while ($row=mysqli_fetch_array($result))
        {
        $userID=$row["id"];
        $ma=$row["math"];
        }
   $val=((1000000000*$ma)+$userId);
   echo $val;
}
mysqli_free_result($result);
mysqli_close($con);

?>