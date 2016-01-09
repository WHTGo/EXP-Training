<?php

/**
 * @author easyvn.net -> it-team
 * @copyright 2015
 */

$id=$_REQUEST["id"];
$math=$_REQUEST["math"];

include('config.inc.php');
include('ConDatabase.php');

$result=mysqli_query($con,"SELECT name FROM users WHERE id=$id AND math=$math AND reg=1;");
if (mysqli_num_rows($result)>0){
    while ($row=mysqli_fetch_array($result))
        {
        $name=$row["name"];
        }
    echo $name;
    }else{
    echo "N";
}
mysqli_free_result($result);
mysqli_close($con);
?>