<?php
// IT-Team:vivu
$stt=$_REQUEST["stt"];
$db=mysqli_connect("localhost","root","","DB_thaoluan");
$co=mysqli_query($db,"SELECT stt FROM view WHERE stt_old=$stt and ch='y'");
if (mysqli_num_rows($co)){
    
    $con=mysqli_query($db,"UPDATE view SET aws='',ch='n' WHERE stt_old=$stt");
    if($con){
        echo 'o';
    }else{
        echo 'Lỗi truy vấn';
    }
    //mysqli_free_result($con);
    
    
}else{ echo 'Chưa có câu trả lời'; }
mysqli_close($db);
?>