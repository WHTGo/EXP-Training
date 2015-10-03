<?php
// IT-Team:vivu
$stt=$_REQUEST["stt"];
$db=mysqli_connect("localhost","root","","DB_thaoluan");
$con=mysqli_query($db,"SELECT * FROM view WHERE stt_old=$stt");
if (mysqli_num_rows($con)){
    
    $co=mysqli_query($db,"DELETE FROM view WHERE stt_old=$stt");
    if ($co){
        echo 'o';
    }else{
        echo 'Lỗi truy vấn!';
    }
}else{ echo 'Câu hỏi không có trên view!';}
mysqli_close($db);
?>