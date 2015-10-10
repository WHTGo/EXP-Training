<?php

/**
 * @author easyvn.net
 * @copyright 2015
 */

include ('config.inc.php');
$con=mysqli_connect($host, $user, $pass,$db)or die ('Không the ket noi toi database');
function rd(){
    $t0=rand(0,9);
    $t1=rand(1,9);
    $t2=rand(0,9);
    $t3=rand(0,9);
    $t4=rand(0,9);
    $t5=rand(0,9);
    $t6=rand(0,9);
    $t7=rand(0,9);

    $id=($t0+(10000000*$t1)+(1000000*$t2)+(100000*$t3)+(10000*$t4)+(1000*$t5)+(100*$t6)+(10*$t7));
    return $id;
}
$userId=rd();
 while(mysqli_query($con,"SELECT * FROM user WHERE id=$userId;")==true ){
    $userId=rd();
 }
//include('radomID.php');
//$now = getdate();
//$time= $now["year"].'-'. $now["mon"].'-'.$now["mday"].' '.$now["hours"].':'. $now["minutes"].':'.$now["seconds"];
//echo $time;
$lsql="INSERT INTO users(id,datet) values($userId,now());";
mysqli_query($con, $lsql);
echo $userId;
mysqli_close($con);


?>