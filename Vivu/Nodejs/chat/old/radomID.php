<?php
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

    $id=($t0+(10000000*$t1)+(1000000*$t2)+(100000*$t3)+(10000*$t4)+(1000*$t5)+(100*$t6)+(10*$t7));
    return $id;
}

function ma(){
    $t0=rand(0,9);
    $t1=rand(1,9);
    $t2=rand(0,9);
    $t3=rand(0,9);
    $ma=((10000*$t3)+(1000*$t2)+(100*$t1)+(10*$t0));
    return $ma;
}
function selectID(){
    $userId=rd();
    $result=mysqli_query($con,"SELECT * FROM user WHERE id=$userId;");
    while(mysqli_num_rows($result)!=0){
        $userId=rd();
        $result=mysqli_query($con,"SELECT * FROM user WHERE id=$userId;");
     }
     return $userId;
}
     
mysqli_close($con);


?>