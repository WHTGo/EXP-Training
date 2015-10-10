<?php

/**
 * @author easyvn.net
 * @copyright 2015
 */

include ('config.inc.php');
include ('ConDatabase.php');

//$sql='select id from user where    DATE_ADD(datet, INTERVAL 40 SECOND) < now()';
//$result=mysqli_query($con,$sql);
//while ($row=mysqli_fetch_array($result))
//    {
//    mysqli_query($con,' DELETE FROM chat.users WHERE users.id= $row;');
//    }

mysqli_query($con,"UPDATE users SET inchat='N',online=0 WHERE DATE_ADD(datet, INTERVAL 10 SECOND) < now();");

//mysqli_close($result);
mysqli_query($con," DELETE FROM users WHERE DATE_ADD(datet, INTERVAL 60 SECOND) < now() AND resg=0 ; ");
//mysqli_query($con," DELETE FROM typing WHERE id<>s ; ");
$result=mysqli_query($con,"SELECT * FROM msgs WHERE id GROUP BY userId");
while ($row=mysqli_fetch_array($result)){
    $id=$row["userId"];
    $you=$row["randomUserId"];
    $re=mysqli_query($con,"SELECT * FROM users WHERE id=$id OR id=$you ");
    if(mysqli_num_rows($re)>0){
        //
     }else{
        mysqli_query($con,"UPDATE msgs SET userId=$id WHERE dele='Y';");
            
        }        
}
mysqli_query($con," DELETE FROM msgs WHERE dele='Y' ; ");




echo 'sussecfull';
mysqli_free_result($result);
mysqli_free_result($re);

mysqli_close($con);
?>