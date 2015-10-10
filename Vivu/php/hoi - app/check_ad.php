<?php
// IT-Team:vivu
$db=mysqli_connect("localhost","root","","DB_thaoluan");
$query="SELECT stt_old FROM view WHERE ch='y'";
$con=mysqli_query($db,$query);
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
