<?php
// IT-Team:vivu
$user=$_REQUEST["user"];
$pass=$_REQUEST["pass"];
$db=mysqli_connect("localhost","root","","DB_thaoluan");
$con=mysqli_query($db,"SELECT * FROM login WHERE user like '$user' and pass like '$pass'");
if (mysqli_num_rows($con)){
    echo 'js/admin/script_admin.js';
    
}else{
    echo 'n';
}
mysqli_free_result($con);
mysqli_close($db);

?>
