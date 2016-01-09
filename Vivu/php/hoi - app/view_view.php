<?php
// IT-Team:vivu
$db=mysqli_connect("localhost","root","","DB_thaoluan");
$con=mysqli_query($db,"SELECT stt_old FROM view");
$data=array();
if(mysqli_num_rows($con)){
    while ($row=mysqli_fetch_array($con,MYSQLI_NUM)){
          $data[]=$row;
    }
    echo json_encode($data);
}else{
    echo "n";
}
mysqli_free_result($con);
mysqli_close($db);
?>