<?php
/*
/**
 * @author easyvn.net
 * @copyright 2015
 */
/*
8include ('config.inc.php');
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
$lsql="INSERT INTO users(id,inchat,datet) values($userId,'N',now());";
mysqli_query($con, $lsql);
echo $userId;
mysqli_close($con);
*/
 


/*
include('config.inc.php');
include('ConDatabase.php');
//$lsql="UPDATE user SET online=1,datet=now() where id=$id";
$sql="UPDATE users SET online=1, datet=now() WHERE id=34116025";

mysqli_query($con,$sql);
echo " sussecfull";
mysqli_close($con);
*/


/*
$result=mysqli_query($con, ' SELECT NOW() AS date;');
while ($row=mysqli_fetch_array($result))
        {
        $date=$row["date"];
        }
echo $date;*/



include('config.inc.php');
include('ConDatabase.php');
function rd(){
    $t0=rand(0,9);
    $t1=rand(1,9);
    $t2=rand(0,9);
    $t3=rand(0,9);
    $t4=rand(0,9);
    $t5=rand(0,9);
    $t6=rand(0,9);
    $t7=rand(0,9);

    $userID=($t0+(10000000*$t1)+(1000000*$t2)+(100000*$t3)+(10000*$t4)+(1000*$t5)+(100*$t6)+(10*$t7));
    return $userID;
}

function ma(){
    $t0=rand(0,9);
    $t1=rand(1,9);
    $t2=rand(0,9);
    $t3=rand(0,9);
    $ma=((10000*$t3)+(1000*$t2)+(100*$t1)+(10*$t0));
    return $ma;
}
function se($con){
    $userId=rd();
    $result=mysqli_query($con,"SELECT * FROM users WHERE id=$userId;");
    while(mysqli_num_rows($result)!=0){
        $userId=rd();
        $result=mysqli_query($con,"SELECT * FROM users WHERE id=$userId;");
     }
     return $userId;
}
 echo se($con);
/*
$result=mysqli_query($con,"SELECT * FROM users WHERE id=$userId;");
while(mysqli_num_rows($result)!=0){
    $userId=rd();
    $result=mysqli_query($con,"SELECT * FROM users WHERE id=$userId;");
}
     
*/






 
?>