<?php

/**
 * @author easyvn.net
 * @copyright 2015
 */
$id=$_REQUEST["id"];

include('config.inc.php');
include('ConDatabase.php');
function ma(){
    $t0=rand(0,9);
    $t1=rand(1,9);
    $t2=rand(0,9);
    $t3=rand(0,9);
    $ma=((10000*$t3)+(1000*$t2)+(100*$t1)+(10*$t0));
    return $ma;
}
$result=mysqli_query($con,"SELECT * FROM users WHERE id=$id;");

while ($row=mysqli_fetch_array($result))
        {
        $math=$row["math"];
        }
if ($math==0){
    $math=ma();
    mysqli_query($con,"UPDATE users SET math=$math WHERE id=$id");
}

echo $math;
mysqli_free_result($result);
mysqli_close ($con);


?>