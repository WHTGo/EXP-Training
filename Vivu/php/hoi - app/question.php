<?php
// IT-Team:vivu
$start=$_REQUEST["id"];
$db=mysqli_connect("localhost","root","","DB_thaoluan");
$query="SELECT stt,name,question FROM view LIMIT $start,20";
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
