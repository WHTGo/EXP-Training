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
$youID=$_REQUEST["youId"];
$msg   ="";
$randomUserId;

//include ('config.inc.php');
include ('ConDatabase.php');
//$lsql="SELECT * FROM chats WHERE userId = $userId ";
$result=mysqli_query($con,"SELECT * FROM chats WHERE userId = $userId ");

$onl=mysqli_query($con," SELECT * FROM users WHERE id=$youID");
if (mysqli_num_rows($onl)!=0){
    while ($ro=mysqli_fetch_array($onl))
        {
            $i=$ro["inchat"];
            
        }
}else {
    $i="N";
}
if ($result!=null){
    $count=(mysqli_num_rows($result));
    
}else{
    $count=0;
}

if (mysqli_connect_errno()){
    echo " l?i k?t n?i t?i co s? d? li?u";
}

if ( $count> 0 and ($i=="Y") )
    {
    $result=mysqli_query($con,"SELECT * FROM msgs WHERE randomUserId = $userId ORDER BY sentdate limit 1");

    $id =0;

    while ($row=mysqli_fetch_array($result))
        {
        $id          = $row["id"];
        $msg         =$row["msg"];
        $randomUserId=$row["userId"];
        }

    if ($id != 0)
        {
        mysqli_query ($con,"DELETE FROM msgs WHERE id = $id ");
        mysqli_query ($con,"INSERT INTO oldMsgs(userId,randomUserId,msg) VALUES( $randomUserId,$userId,'$msg'); ");
        }
    }
else
    {
    echo "||--noResult--||";
    }

mysqli_free_result($result);
mysqli_close ($con);

echo $msg;
?>