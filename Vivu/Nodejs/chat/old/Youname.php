<?php

/**
 * @author easyvn.net
 * @copyright 2015
 */
$id=$_REQUEST["youId"];
include ('config.inc.php');
include ('ConDatabase.php');
$result=mysqli_query($con,"SELECT * FROM users WHERE id = $id ");
while ( $row=mysqli_num_rows($result)){
    $name=$row["name"];
}
echo $name;
mysqli_free_result($result);
mysqli_close($con);
?>