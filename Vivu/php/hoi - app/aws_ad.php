<?php
// IT-Team:vivu

$stt=$_REQUEST["stt"];
$db=mysqli_connect("localhost","root","","DB_thaoluan");
$conn=mysqli_query($db,"SELECT * FROM view WHERE stt_old=$stt and ch like 'y'");
if (mysqli_num_rows($conn)>0){
    $query="SELECT aws FROM view WHERE stt_old=$stt";
    $con=mysqli_query($db,$query);
    while ($row=mysqli_fetch_array($con)){
              $data=$row['aws'];
        }
    echo $data;
    mysqli_free_result($con);
}else{
    echo 'Chưa có câu trả lời!';
}
mysqli_free_result($conn);
mysqli_close($db);

?>
