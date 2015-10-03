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
 $ma=$_REQUEST["math"];
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
function selectID($con){
    $userId=rd();
    $result=mysqli_query($con,"SELECT * FROM users WHERE id=$userId;");
    while(mysqli_num_rows($result)!=0){
        $userId=rd();
        $result=mysqli_query($con,"SELECT * FROM users WHERE id=$userId;");
     }
     return $userId;
}


if ($userId==0){
    $ma=ma();
    $userId=selectID($con);
    //mysqli_query($con,"INSERT INTO using(id, ) VALUES($userId,$ma);");
    mysqli_query($con,"INSERT INTO users(id,name,inchat,online,math,datet) VALUES($userId,'n','N',1,$ma,now());");

}else{
    $rest=mysqli_query($con,"SELECT * FROM users WHERE id=$userId;");
    if (mysqli_num_rows($rest)>0){
        $re=mysqli_query($con,"SELECT * FROM users WHERE id=$userId AND math=$ma;");
        if(mysqli_num_rows($re)>0){
            
        }else {
            //..
            $userId=selectID($con);
            mysqli_query($con,"INSERT INTO users(id,name,inchat,online,math,datet) VALUES($userId,'n','N',1,$ma,now());");
        }
    } else {
        mysqli_query($con,"INSERT INTO users(id,name,inchat,online,math,datet) VALUES($userId,'n','N',1,$ma,now());");
    }
    
}
//$val=((1000000000*$ma)+$userId);

echo $userId;

mysqli_close($con);
?>