<?php
//IT-Team
$stt=$_REQUEST["stt"];
$msg=$_REQUEST["msg"];
$db=mysqli_connect("localhost","root","","DB_thaoluan");
$conn=mysqli_query($db,"SELECT * FROM view WHERE stt_old=$stt");
if (mysqli_num_rows($conn)>0){
    $query="UPDATE view SET aws='$msg', ch='y' WHERE stt_old=$stt";
    $con=mysqli_query($db,$query);
    if ($con){
        echo "o";
    }else{
        echo 'Lỗi truy vân cơ sở dữ liệu';
    }
    
}else{
    echo 'Câu hỏi chưa được view!';
}


mysqli_free_result($conn);
mysqli_close($db);
?>